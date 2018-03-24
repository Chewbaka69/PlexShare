<?php

namespace Fuel\Migrations;

include __DIR__."/../normalizedrivertypes.php";

class Auth_Create_Authdefaults
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
			$connection = $this->dbconnection('ormauth');

			/*
			 * create the default Groups and roles, to be compatible with standard Auth
			 */

			// create the 'Banned' group, 'banned' role
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Banned'))->execute($connection);
			list($role_id, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'banned', 'filter' => 'D'))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id))->execute($connection);

			// create the 'Guests' group
			list($group_id_guest, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Guests'))->execute($connection);
			list($role_id_guest, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'public'))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id_guest, 'role_id' => $role_id_guest))->execute($connection);

			// create the 'Users' group
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Users'))->execute($connection);
			list($role_id_user, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'user'))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_user))->execute($connection);

			// create the 'Moderators' group
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Moderators'))->execute($connection);
			list($role_id_mod, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'moderator'))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_user))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_mod))->execute($connection);

			// create the 'Administrators' group
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Administrators'))->execute($connection);
			list($role_id, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'administrator'))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_user))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_mod))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id))->execute($connection);

			// create the 'Superadmins' group
			list($group_id_admin, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Super Admins'))->execute($connection);
			list($role_id_admin, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'superadmin', 'filter' => 'A'))->execute($connection);
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id_admin, 'role_id' => $role_id_admin))->execute($connection);

			/*
			 * create the default admin user, so we have initial access
			 */

			// create the administrator account if needed, and assign it the superadmin group so it has all access
			$result = \DB::select('id')->from($table)->where('username', '=', 'admin')->execute($connection);
			if (count($result) == 0)
			{
				\Auth::instance()->create_user('admin', 'admin', 'admin@example.org', $group_id_admin, array('fullname' => 'System administrator'));
			}

			// create the guest account
			list($guest_id, $affected) = \DB::insert($table)->set(
				array(
					'username' => 'guest',
					'password' => 'YOU CAN NOT USE THIS TO LOGIN',
					'email' => '',
					'group_id' => $group_id_guest,
					'last_login' => 0,
					'previous_login' => 0,
					'login_hash' => '',
					'user_id' => 0,
					'created_at' => time(),
					'updated_at' => 0,
				)
			)->execute($connection);

			// adjust the id's, auto_increment doesn't want to create a key with value 0
			\DB::update($table)->set(array('id' => 0))->where('id', '=', $guest_id)->execute($connection);

			// add guests full name to the metadata
			\DB::insert($table.'_metadata')->set(
				array(
					'parent_id' => 0,
					'key' => 'fullname',
					'value' => 'Guest',
				)
			)->execute($connection);
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

			// empty the user, group and role tables
			\DBUtil::truncate_table($table);
			\DBUtil::truncate_table($table.'_groups');
			\DBUtil::truncate_table($table.'_roles');
			\DBUtil::truncate_table($table.'_group_roles');
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
