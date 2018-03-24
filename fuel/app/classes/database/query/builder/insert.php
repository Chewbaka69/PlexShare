<?php

/**
 * OVERRIDE the CORE classe because pre_save can not set values
 * Class Database_Query_Builder_Insert
 */

class Database_Query_Builder_Insert extends Fuel\Core\Database_Query_Builder_Insert
{
	/**
	 * Adds values. Multiple value sets can be added.
	 *
	 * @throws \FuelException
	 * @param array $values
	 * @return $this
	 */
	public function values(array $values)
	{
		if ( ! is_array($this->_values))
		{
			throw new \FuelException('INSERT INTO ... SELECT statements cannot be combined with INSERT INTO ... VALUES');
		}

		// Get all of the passed values
		$values = func_get_args();

		//OVERRIDE
        if (isset($this->_values) && !empty($this->_values)) {
            $this->_values[0] = array_merge($this->_values[0], $values[0]);
        } else {
            $this->_values = array_merge($this->_values, $values);
        }

		return $this;
	}
}
