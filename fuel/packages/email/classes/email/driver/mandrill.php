<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Email;

use Mandrill;
use Mandrill_Messages;

class Email_Driver_Mandrill extends \Email_Driver
{
	/**
	 * Global merge vars
	 *
	 * @var array
	 */
	protected $merge_vars = array();

	/**
	 * Recipient merge vars
	 *
	 * @var array
	 */
	protected $rcpt_merge_vars = array();

	/**
	 * Global metadata
	 *
	 * @var array
	 */
	protected $metadata = array();

	/**
	 * Recipient metadata
	 *
	 * @var array
	 */
	protected $rcpt_metadata = array();

	/**
	 * {@inheritdoc}
	 */
	public function __construct(array $config)
	{
		// Mandrill wants header encoding to be switched off
		$config['encode_headers'] = false;

		parent::__construct($config);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function _send()
	{
		$mandrill = new \Mandrill($this->config['mandrill']['key']);

		$message = new Mandrill_Messages($mandrill);

		$headers = $this->extra_headers;

		// Get recipients
		$to = $this->build_rcpt();
		$cc = $this->build_rcpt('cc');
		$bcc = $this->build_rcpt('bcc');

		$to = array_merge($bcc, $cc, $to);

		// Get recipient merge vars
		$merge_vars = array();

		foreach ($this->rcpt_merge_vars as $rcpt => $_merge_vars)
		{
			$merge_vars[] = array(
				'rcpt' => $rcpt,
				'vars' => \Arr::keyval_to_assoc($_merge_vars, 'name', 'content'),
			);
		}

		// Get recipient meta data
		$metadata = array();

		foreach ($this->rcpt_metadata as $rcpt => $_metadata)
		{
			$metadata[] = array(
				'rcpt'   => $rcpt,
				'values' => $_metadata,
			);
		}

		// Get attachments
		$attachments = array();

		foreach ($this->attachments['attachment'] as $cid => $attachment)
		{
			$attachments[] = array(
				'type'    => $attachment['mime'],
				'name'    => $attachment['file'][1],
				'content' => $attachment['contents'],
			);
		}

		// Get inline images
		$images = array();

		foreach ($this->attachments['inline'] as $cid => $attachment)
		{
			if (\Str::starts_with($attachment['mime'], 'image/'))
			{
				$name = substr($cid, 4); // remove cid:

				$images[] = array(
					'type'    => $attachment['mime'],
					'name'    => $name,
					'content' => $attachment['contents'],
				);
			}
		}

		// Get reply-to addresses
		if ( ! empty($this->reply_to))
		{
			$headers['Reply-To'] = static::format_addresses($this->reply_to);
		}

		$important = false;

		if (in_array($this->config['priority'], array(\Email::P_HIGH, \Email::P_HIGHEST)))
		{
			$important = true;
		}

		$message_data = array(
			'html'               => $this->body,
			'text'               => isset($this->alt_body) ? $this->alt_body : '',
			'subject'            => $this->subject,
			'from_email'         => $this->config['from']['email'],
			'from_name'          => $this->config['from']['name'],
			'to'                 => $to,
			'headers'            => $headers,
			'global_merge_vars'  => \Arr::keyval_to_assoc($this->merge_vars, 'name', 'content'),
			'merge_vars'         => $merge_vars,
			'metadata'           => $this->metadata,
			'recipient_metadata' => $metadata,
			'attachments'        => $attachments,
			'images'             => $images,
			'important'          => $important,
		);

		$message_options = \Arr::filter_keys($this->get_config('mandrill.message_options', array()), array_keys($message_data), true);

		$message_data = \Arr::merge($message_data, $message_options);

		$send_options = extract($this->config['mandrill']['send_options'], EXTR_SKIP);

		$message->send($message_data, $async, $ip_pool, $send_at);

		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function attach($file, $inline = false, $cid = null, $mime = null, $name = null)
	{
		parent::attach($file, $inline, $cid, $mime, $name);

		if ($inline === true)
		{
			// Check the last attachment
			$attachment = end($this->attachments['inline']);

			if ( ! \Str::starts_with($attachment['mime'], 'image/'))
			{
				throw new \InvalidAttachmentsException('Non-image inline attachments are not supported by this driver.');
			}
		}
	}

	/**
	 * Add type to recipient list
	 *
	 * @param  string $list to, cc, bcc
	 * @return array
	 */
	protected function build_rcpt($list = 'to')
	{
		return array_map(function ($item) use ($list)
		{
			$item['type'] = $list;

			return $item;
		}, $this->{$list});
	}

	/**
	 * {@inheritdoc}
	 */
	protected function clear_list($list)
	{
		is_array($list) or $list = array($list);

		foreach ($list as $_list)
		{
			$rcpt = array_keys($this->{$_list});
			\Arr::delete($this->rcpt_merge_vars, $rcpt);
			\Arr::delete($this->rcpt_metadata, $rcpt);
		}

		return parent::clear_list($list);
	}

	/**
	 * Get merge vars
	 *
	 * @param  mixed $key  Null for all, string for specific
	 * @param  mixed $rcpt Null for global, string for recipient
	 * @return array
	 */
	public function get_merge_vars($key = null, $rcpt = null)
	{
		if (is_null($rcpt))
		{
			return \Arr::get($this->merge_vars, $key);
		}
		elseif (isset($this->rcpt_merge_vars[$rcpt]))
		{
			return \Arr::get($this->rcpt_merge_vars[$rcpt], $key);
		}
	}

	/**
	 * Add merge vars
	 *
	 * @param  array $merge_vars  Key-value pairs
	 * @param  mixed $rcpt        Null for global, string for recipient
	 * @return array
	 */
	public function add_merge_vars(array $merge_vars, $rcpt = null)
	{
		if (is_null($rcpt))
		{
			$this->merge_vars = $merge_vars;
		}
		else
		{
			$this->rcpt_merge_vars[$rcpt] = $merge_vars;
		}

		return $this;
	}

	/**
	 * Set one or several merge vars
	 *
	 * @param mixed $key   Array for many vars, string for one
	 * @param mixed $value In case of many vars it is ommited
	 * @param mixed $rcpt  Null for global, string for recipient
	 * @return object $this
	 */
	public function set_merge_var($key, $value = null, $rcpt = null)
	{
		is_array($key) or $key = array($key => $value);

		if (is_null($rcpt))
		{
			$this->merge_vars = \Arr::merge($this->merge_vars, $key);
		}
		else
		{
			$merge_vars = \Arr::get($this->rcpt_merge_vars, $rcpt, array());
			$this->rcpt_merge_vars[$rcpt] = \Arr::merge($merge_vars, $key);
		}

		return $this;
	}

	/**
	 * Get metadata
	 *
	 * @param  mixed $key  Null for all, string for specific
	 * @param  mixed $rcpt Null for global, string for recipient
	 * @return array
	 */
	public function get_metadata($key = null, $rcpt = null)
	{
		if (is_null($rcpt))
		{
			return \Arr::get($this->metadata, $key);
		}
		elseif (isset($this->rcpt_metadata[$rcpt]))
		{
			return \Arr::get($this->rcpt_metadata[$rcpt], $key);
		}
	}

	/**
	 * Add metadata
	 *
	 * @param  array $metadata    Key-value pairs
	 * @param  mixed $rcpt        Null for global, string for recipient
	 * @return array
	 */
	public function add_metadata(array $metadata, $rcpt = null)
	{
		if (is_null($rcpt))
		{
			$this->metadata = $metadata;
		}
		else
		{
			$this->rcpt_metadata[$rcpt] = $metadata;
		}

		return $this;
	}

	/**
	 * Set one or several metadata
	 *
	 * @param  mixed $key   Array for many, string for one
	 * @param  mixed $value In case of many it is ommited
	 * @param  mixed $rcpt  Null for global, string for recipient
	 * @return object $this
	 */
	public function set_metadata($key, $value = null, $rcpt = null)
	{
		is_array($key) or $key = array($key => $value);

		if (is_null($rcpt))
		{
			$this->metadata = \Arr::merge($this->metadata, $key);
		}
		else
		{
			$metadata = \Arr::get($this->rcpt_metadata, $rcpt, array());
			$this->rcpt_metadata[$rcpt] = \Arr::merge($metadata, $key);
		}

		return $this;
	}
}
