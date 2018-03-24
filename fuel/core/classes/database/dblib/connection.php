<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @author     cocteau666@gmail.com
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @copyright  2008 - 2009 Kohana Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Core;

class Database_Dblib_Connection extends \Database_PDO_Connection
{
	/**
	 * Stores the database configuration locally and name the instance.
	 *
	 * [!!] This method cannot be accessed directly, you must use [static::instance].
	 *
	 * @param string $name
	 * @param array  $config
	 */
	protected function __construct($name, array $config)
	{
		// this driver only works on Windows
		if (php_uname('s') === 'Windows')
		{
			throw new \Database_Exception('The "Dblib" database driver does not work well on Windows. Use the "Sqlsrv" driver instead.');
		}

		parent::__construct($name, $config);
	}

	/**
	 * List tables
	 *
	 * @param string $like
	 *
	 * @throws \FuelException
	 */
	public function list_tables($like = null)
	{
		$query = "SELECT name FROM sys.objects WHERE type = 'U' AND name != 'sysdiagrams'";

		if (is_string($like))
		{
			$query .= " AND name LIKE ".$this->quote($like);
		}

		// Find all table names
		$result = $this->query(\DB::SELECT, $query, false);

		$tables = array();
		foreach ($result as $row)
		{
			$tables[] = reset($row);
		}

		return $tables;
	}

	/**
	 * List table columns
	 *
	 * @param   string  $table  table name
	 * @param   string  $like   column name pattern
	 * @return  array   array of column structure
	 */
	public function list_columns($table, $like = null)
	{
		$query = "SELECT * FROM Sys.Columns WHERE id = object_id('" . $this->quote_table($table) . "')";

		if (is_string($like))
		{
			// Search for column names
			$query .= " AND name LIKE ".$this->quote($like);
		}

		// Find all column names
		$result = $this->query(\DB::SELECT, $query, false);

		$count = 0;
		$columns = array();
		foreach ($result as $row)
		{
			list($type, $length) = $this->_parse_type($row['Type']);
			$column = $this->datatype($type);
			$column['name']             = $row['Field'];
			$column['default']          = $row['Default'];
			$column['data_type']        = $type;
			$column['null']             = ($row['Null'] == 'YES');
			$column['ordinal_position'] = ++$count;
			switch ($column['type'])
			{
				case 'float':
					if (isset($length))
					{
						list($column['numeric_precision'], $column['numeric_scale']) = explode(',', $length);
					}
				break;
				case 'int':
					if (isset($length))
					{
						$column['display'] = $length;
					}
				break;
				case 'string':
					switch ($column['data_type'])
					{
						case 'binary':
						case 'varbinary':
							$column['character_maximum_length'] = $length;
						break;
						case 'char':
						case 'varchar':
							$column['character_maximum_length'] = $length;
						case 'text':
						case 'tinytext':
						case 'mediumtext':
						case 'longtext':
							$column['collation_name'] = $row['Collation'];
						break;
						case 'enum':
						case 'set':
							$column['collation_name'] = $row['Collation'];
							$column['options'] = explode('\',\'', substr($length, 1, -1));
						break;
					}
				break;
			}
			$column['comment']      = $row['Comment'];
			$column['extra']        = $row['Extra'];
			$column['key']          = $row['Key'];
			$column['privileges']   = $row['Privileges'];
			$columns[$row['Field']] = $column;
		}
		return $columns;
	}

	/**
	 * Set the charset
	 *
	 * @param string $charset
	 */
	public function set_charset($charset)
	{
		// does not support charsets
	}

}
