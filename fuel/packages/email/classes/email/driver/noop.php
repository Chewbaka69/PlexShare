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

class Email_Driver_Noop extends \Email_Driver
{
	/**
	 * Noop send: only log the request
	 *
	 * @return  bool    Success boolean.
	 */
	protected function _send()
	{
		$message = $this->build_message();

		logger(\Fuel::L_INFO, 'To: '.static::format_addresses($this->to), 'Email NoOp driver');
		logger(\Fuel::L_INFO, 'Subject: '.$this->subject, 'Email NoOp driver');
		logger(\Fuel::L_INFO, 'Header: '.$message['header'], 'Email NoOp driver');
		logger(\Fuel::L_INFO, 'Body: '.$message['body'], 'Email NoOp driver');

		return true;
	}

}
