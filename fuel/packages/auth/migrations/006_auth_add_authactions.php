<?php

namespace Fuel\Migrations;

include __DIR__."/../normalizedrivertypes.php";

class Auth_Add_Authactions
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

			// add the actions field to the permission and permission through tables
			\DBUtil::add_fields($table.'_permissions', array(
				'actions' => array('type' => 'text', 'null' => true, 'after' => 'description'),
			));
			\DBUtil::add_fields($table.'_user_permissions', array(
				'actions' => array('type' => 'text', 'null' => true, 'after' => 'perms_id'),
			));
			\DBUtil::add_fields($table.'_group_permissions', array(
				'actions' => array('type' => 'text', 'null' => true, 'after' => 'perms_id'),
			));
			\DBUtil::add_fields($table.'_role_permissions', array(
				'actions' => array('type' => 'text', 'null' => true, 'after' => 'perms_id'),
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
			$this->dbconnection('ormauth');

			\DBUtil::drop_fields($table.'_permissions', array(
				'actions',
			));
			\DBUtil::drop_fields($table.'_user_permissions', array(
				'actions',
			));
			\DBUtil::drop_fields($table.'_group_permissions', array(
				'actions',
			));
			\DBUtil::drop_fields($table.'_role_permissions', array(
				'actions',
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
	}
}
