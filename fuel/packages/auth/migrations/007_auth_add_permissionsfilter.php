<?php

namespace Fuel\Migrations;

include __DIR__."/../normalizedrivertypes.php";

class Auth_Add_Permissionsfilter
{
	function up()
	{
		// get the drivers defined
		$drivers = normalize_driver_types();

		if (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$table = \Config::get('ormauth.table_name', 'users');

			// make sure the correct connection is used
			$this->dbconnection('ormauth');

			// modify the filter field to add the 'remove' filter
			\DBUtil::modify_fields($table.'_roles', array(
				'filter' => array('type' => 'enum', 'constraint' => "'', 'A', 'D', 'R'", 'default' => ''),
			));
		}

		// reset any DBUtil connection set
		$this->dbconnection(false);
	}

	function down()
	{
		// get the drivers defined
		$drivers = normalize_driver_types();

		if (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$table = \Config::get('ormauth.table_name', 'users');

			// make sure the correct connection is used
			$connection = $this->dbconnection('ormauth');

			// modify the filter field to add the 'remove' filter
			\DB::update($table.'_roles')->set(array('filter' => 'D'))->where('filter', '=', 'R')->execute($connection);

			\DBUtil::modify_fields($table.'_roles', array(
				'filter' => array('type' => 'enum', 'constraint' => "'', 'A', 'D'", 'default' => ''),
			));
		}

		// reset any DBUtil connection set
		$this->dbconnection(false);
	}

	/**
	 * check if we need to override the db connection for auth tables
	 */
	protected function dbconnection($type = null)
	{
		static $connection;

		switch ($type)
		{
			// switch to the override connection
			case 'simpleauth':
			case 'ormauth':
				if ($connection = \Config::get($type.'.db_connection', null))
				{
					\DBUtil::set_connection($connection);
				}
				break;

			// switch back to the configured migration connection, or the default one
			case false:
				if ($connection)
				{
					\DBUtil::set_connection(\Config::get('migrations.connection', null));
				}
				break;

			default:
				// noop
		}

		return $connection;
	}
}
