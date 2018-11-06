<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.1
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2018 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Email;

class SmtpConnectionException extends \FuelException {}

class SmtpCommandFailureException extends \EmailSendingFailedException {}

class SmtpTimeoutException extends \EmailSendingFailedException {}

class SmtpAuthenticationFailedException extends \FuelException {}

class Email_Driver_Smtp extends \Email_Driver
{
	/**
	 * Class destructor
	 */
	function __destruct()
	{
		// makes sure any open connections will be closed
		if ($this->smtp_connection)
		{
			$this->smtp_disconnect();
		}
	}

	/**
	 * The SMTP connection
	 */
	protected $smtp_connection = null;

	/**
	 * Initiates the sending process.
	 *
	 * @return  bool    success boolean
	 */
	protected function _send()
	{
		// send the email
		try
		{
			return $this->_send_email();
		}

		// something failed
		catch (\Exception $e)
		{
			// disconnect if needed
			if ($this->smtp_connection)
			{
				if ($e instanceOf SmtpTimeoutException)
				{
					// simply close the connection
					fclose($this->smtp_connection);
					$this->smtp_connection = null;
				}
				else
				{
					// proper close, with a QUIT
					$this->smtp_disconnect();
				}
			}

			// rethrow the exception
			throw $e;
		}
	}

	/**
	 * Sends the actual email
	 *
	 * @return  bool    success boolean
	 */
	protected function _send_email()
	{
		$message = $this->build_message(true);

		if(empty($this->config['smtp']['host']) or empty($this->config['smtp']['port']))
		{
			throw new \FuelException('Must supply a SMTP host and port, none given.');
		}

		// Use authentication?
		$authenticate = (empty($this->smtp_connection) and ! empty($this->config['smtp']['username']) and ! empty($this->config['smtp']['password']));

		// Connect
		$this->smtp_connect();

		// Authenticate when needed
		$authenticate and $this->smtp_authenticate();

		// Set return path
		$return_path = empty($this->config['return_path']) ? $this->config['from']['email'] : $this->config['return_path'];
		$this->smtp_send('MAIL FROM:<' . $return_path .'>', 250);

		foreach(array('to', 'cc', 'bcc') as $list)
		{
			foreach($this->{$list} as $recipient)
			{
				$this->smtp_send('RCPT TO:<'.$recipient['email'].'>', array(250, 251));
			}
		}

		// Prepare for data sending
		$this->smtp_send('DATA', 354);

		$lines = explode($this->config['newline'], $message['header'].preg_replace('/^\./m', '..$1', $message['body']));

		foreach($lines as $line)
		{
			if(substr($line, 0, 1) === '.')
			{
				$line = '.'.$line;
			}

			fputs($this->smtp_connection, $line.$this->config['newline']);
		}

		// Finish the message
		$this->smtp_send('.', 250);

		// Close the connection if we're not using pipelining
		$this->pipelining or $this->smtp_disconnect();

		return true;
	}

	/**
	 * Connects to the given smtp and says hello to the other server.
	 */
	protected function smtp_connect()
	{
		// re-use the existing connection
		if ( ! empty($this->smtp_connection))
		{
			return;
		}

		// add a transport if not given
		if (strpos($this->config['smtp']['host'], '://') === false)
		{
			$this->config['smtp']['host'] = 'tcp://'.$this->config['smtp']['host'];
		}

		$this->smtp_connection = stream_socket_client(
			$this->config['smtp']['host'].':'.$this->config['smtp']['port'],
			$error_number,
			$error_string,
			$this->config['smtp']['timeout']
		);

		if(empty($this->smtp_connection))
		{
			throw new SmtpConnectionException('Could not connect to SMTP: ('.$error_number.') '.$error_string);
		}

		// Clear the smtp response
		$this->smtp_get_response();

		// Just say hello!
		try
		{
			$this->smtp_send('EHLO'.' '.\Input::server('SERVER_NAME', 'localhost.local'), 250);
		}
		catch(SmtpCommandFailureException $e)
		{
			// Didn't work? Try HELO
			$this->smtp_send('HELO'.' '.\Input::server('SERVER_NAME', 'localhost.local'), 250);
		}

		// Enable TLS encryption if needed, and we're connecting using TCP
		if (\Arr::get($this->config, 'smtp.starttls', false) and strpos($this->config['smtp']['host'], 'tcp://') === 0)
		{
			try
			{
				$this->smtp_send('STARTTLS', 220);
				if ( ! stream_socket_enable_crypto($this->smtp_connection, true, STREAM_CRYPTO_METHOD_TLS_CLIENT))
				{
					throw new SmtpConnectionException('STARTTLS failed, Crypto client can not be enabled.');
    			}
			}
			catch(SmtpCommandFailureException $e)
			{
				throw new SmtpConnectionException('STARTTLS failed, invalid return code received from server.');
			}

			// Say hello again, the service list might be updated (see RFC 3207 section 4.2)
			try
			{
				$this->smtp_send('EHLO'.' '.\Input::server('SERVER_NAME', 'localhost.local'), 250);
			}
			catch(SmtpCommandFailureException $e)
			{
				// Didn't work? Try HELO
				$this->smtp_send('HELO'.' '.\Input::server('SERVER_NAME', 'localhost.local'), 250);
			}
		}

		try
		{
			$this->smtp_send('HELP', 214);
		}
		catch(SmtpCommandFailureException $e)
		{
			// Let this pass as some servers don't support this.
		}
	}

	/**
	 * Close SMTP connection
	 */
	protected function smtp_disconnect()
	{
		$this->smtp_send('QUIT', false);
		fclose($this->smtp_connection);
		$this->smtp_connection = null;
	}

	/**
	 * Performs authentication with the SMTP host
	 */
	protected function smtp_authenticate()
	{
		// Encode login data
		$username = base64_encode($this->config['smtp']['username']);
		$password = base64_encode($this->config['smtp']['password']);

		try
		{
			// Prepare login
			$this->smtp_send('AUTH LOGIN', 334);

			// Send username
			$this->smtp_send($username, 334);

			// Send password
			$this->smtp_send($password, 235);

		}
		catch(SmtpCommandFailureException $e)
		{
			throw new SmtpAuthenticationFailedException('Failed authentication.');
		}

	}

	/**
	 * Sends data to the SMTP host
	 *
	 * @param   string              $data           The SMTP command
	 * @param   string|bool|string  $expecting      The expected response
	 * @param   bool                $return_number  Set to true to return the status number
	 *
	 * @throws \SmtpCommandFailureException When the command failed an expecting is not set to false.
	 * @throws \SmtpTimeoutException        SMTP connection timed out
	 *
	 * @return   mixed                         Result or result number, false when expecting is false
	 */
	protected function smtp_send($data, $expecting, $return_number = false)
	{
		! is_array($expecting) and $expecting !== false and $expecting = array($expecting);

		stream_set_timeout($this->smtp_connection, $this->config['smtp']['timeout']);
		if ( ! fputs($this->smtp_connection, $data . $this->config['newline']))
		{
			if($expecting === false)
			{
				return false;
			}
			throw new SmtpCommandFailureException('Failed executing command: '. $data);
		}

		$info = stream_get_meta_data($this->smtp_connection);
		if($info['timed_out'])
		{
			throw new SmtpTimeoutException('SMTP connection timed out.');
		}

		// Get the reponse
		$response = $this->smtp_get_response();

		// Get the reponse number
		$number = (int) substr(trim($response), 0, 3);

		// Check against expected result
		if($expecting !== false and ! in_array($number, $expecting))
		{
			throw new SmtpCommandFailureException('Got an unexpected response from host on command: ['.$data.'] expecting: '.join(' or ', $expecting).' received: '.$response);
		}

		if($return_number)
		{
			return $number;
		}

		return $response;
	}

	/**
	 * Get SMTP response
	 *
	 * @throws \SmtpTimeoutException
	 *
	 * @return  string  SMTP response
	 */
	protected function smtp_get_response()
	{
		$data = '';

		// set the timeout.
		stream_set_timeout($this->smtp_connection, $this->config['smtp']['timeout']);

		while($str = fgets($this->smtp_connection, 512))
		{
			$info = stream_get_meta_data($this->smtp_connection);
			if($info['timed_out'])
			{
				throw new SmtpTimeoutException('SMTP connection timed out.');
			}

			$data .= $str;

			if (substr($str, 3, 1) === ' ')
			{
				break;
			}
		}

		return $data;
	}

}
