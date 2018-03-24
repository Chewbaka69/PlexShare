<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @copyright  2008 - 2009 Kohana Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Core;

class Database_Result_Cached extends \Database_Result
{
	/**
	 * @param  array   $result
	 * @param  string  $sql
	 * @param  mixed   $as_object
	 */
	public function __construct(array $result, $sql, $as_object = null)
	{
		parent::__construct($result, $sql, $as_object);

		// Find the number of rows in the result
		$this->_total_rows = count($result);
	}

	public function __destruct()
	{
		// Cached results do not use resources
	}

	/**
	 * @return $this
	 */
	public function cached()
	{
		return $this;
	}

	/**
	 * @param integer $offset
	 *
	 * @return bool
	 */
	public function seek($offset)
	{
		if ( ! $this->offsetExists($offset))
		{
			return false;
		}

		$this->_current_row = $offset;
		return true;
	}

	/**
	 * @return mixed
	 */
	public function current()
	{
		if ($this->valid())
		{
			// sanitize the data if needed
			if ( ! $this->_sanitization_enabled)
			{
				$result = $this->_result[$this->_current_row];
			}
			else
			{
				$result = \Security::clean($this->_result[$this->_current_row], null, 'security.output_filter');
			}

			return $result;
		}
	}

}
