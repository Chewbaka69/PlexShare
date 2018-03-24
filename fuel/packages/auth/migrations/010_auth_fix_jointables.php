<?php

namespace Fuel\Migrations;

include __DIR__."/../normalizedrivertypes.php";

class Auth_Fix_Jointables
{
	function up()
	{
		// get the drivers defined
		$drivers = normalize_driver_types();

		if (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$basetable = \Config::get('ormauth.table_name', 'users');

			// make sure the correct connection is used
			$this->dbconnection('ormauth');

			\DBUtil::drop_index($basetable.'_user_permissions', 'primary');
			\DBUtil::add_fields($basetable.'_user_permissions', array(
				'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'primary_key' => true, 'first' => true),
			));

			\DBUtil::drop_index($basetable.'_group_permissions', 'primary');
			\DBUtil::add_fields($basetable.'_group_permissions', array(
				'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'primary_key' => true, 'first' => true),
			));

			\DBUtil::drop_index($basetable.'_role_permissions', 'primary');
			\DBUtil::add_fields($basetable.'_role_permissions', array(
				'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'primary_key' => true, 'first' => true),
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
			$basetable = \Config::get('ormauth.table_name', 'users');

			// make sure the correct connection is used
			$this->dbconnection('ormauth');

			\DBUtil::drop_fields($basetable.'_user_permissions', array(
				'id',
			));
			\DBUtil::create_index($basetable.'_user_permissions', array('user_id', 'perms_id'), '', 'PRIMARY');

			\DBUtil::drop_fields($basetable.'_group_permissions', array(
				'id',
			));
			\DBUtil::create_index($basetable.'_group_permissions', array('group_id', 'perms_id'), '', 'PRIMARY');

			\DBUtil::drop_fields($basetable.'_role_permissions', array(
				'id',
			));
			\DBUtil::create_index($basetable.'_role_permissions', array('role_id', 'perms_id'), '', 'PRIMARY');
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
