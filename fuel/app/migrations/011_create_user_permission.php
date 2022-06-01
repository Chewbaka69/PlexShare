<?php

namespace Fuel\Migrations;

class Create_user_permission
{
	public function up()
	{
		\DBUtil::create_table('user_permission', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'permission_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'user_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'library_id' => array('type' => 'varchar', 'null' => true, 'constraint' => 36),
			'value' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintPermissionUserPermission ON user_permission(`permission_id`)')->execute();
		\DB::query('CREATE INDEX constraintUserUserPermission ON user_permission(`user_id`)')->execute();
		\DB::query('CREATE INDEX constraintLibraryUserPermission ON user_permission(`library_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintPermissionUserPermission ON user_permission')->execute();
		\DB::query('DROP INDEX constraintUserUserPermission ON user_permission')->execute();
		\DB::query('DROP INDEX constraintLibraryUserPermission ON user_permission')->execute();

		\DBUtil::drop_table('user_permission');
	}
}