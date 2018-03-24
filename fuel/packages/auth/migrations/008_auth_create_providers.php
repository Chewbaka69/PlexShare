<?php

namespace Fuel\Migrations;

include __DIR__."/../normalizedrivertypes.php";

class Auth_Create_Providers
{
	function up()
	{
		// get the drivers defined
		$drivers = normalize_driver_types();

		if (in_array('Simpleauth', $drivers))
		{
			// get the tablename
			\Config::load('simpleauth', true);
			$table = \Config::get('simpleauth.table_name', 'users').'_providers';

			// make sure the correct connection is used
			$this->dbconnection('simpleauth');
		}

		elseif (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$table = \Config::get('ormauth.table_name', 'users').'_providers';

			// make sure the correct connection is used
			$this->dbconnection('ormauth');
		}

		if (isset($table))
		{
			\DBUtil::create_table($table, array(
				'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
				'parent_id' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
				'provider' => array('type' => 'varchar', 'constraint' => 50),
				'uid' => array('type' => 'varchar', 'constraint' => 255),
				'secret' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
				'access_token' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
				'expires' => array( 'type' => 'int', 'constraint' => 12, 'default' => 0, 'null' => true),
				'refresh_token' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
				'user_id' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
				'created_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
				'updated_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
			), array('id'));

			\DBUtil::create_index($table, 'parent_id', 'parent_id');
		}

		// reset any DBUtil connection set
		$this->dbconnection(false);
	}

	function down()
	{
		// get the drivers defined
		$drivers = normalize_driver_types();

		if (in_array('Simpleauth', $drivers))
		{
			// get the tablename
			\Config::load('simpleauth', true);
			$table = \Config::get('simpleauth.table_name', 'users').'_providers';

			// make sure the correct connection is used
			$this->dbconnection('simpleauth');
		}

		elseif (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$table = \Config::get('ormauth.table_name', 'users').'_providers';

			// make sure the correct connection is used
			$this->dbconnection('ormauth');
		}

		if (isset($table))
		{
			// drop the users remote table
			\DBUtil::drop_table($table);
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
	}
}
