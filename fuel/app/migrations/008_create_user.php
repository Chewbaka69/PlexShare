<?php

namespace Fuel\Migrations;

class Create_user
{
	public function up()
	{
		\DBUtil::create_table('user', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'username' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'email' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'password' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'admin' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
			'lastlogin' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'parent_id' => array('type' => 'varchar', 'null' => true, 'constraint' => 36),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintUserUser ON ' . \DB::table_prefix('user') . '(`parent_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintUserUser ON ' . \DB::table_prefix('user'))->execute();

		\DBUtil::drop_table('user');
	}
}