<?php

namespace Fuel\Migrations;

class Create_server
{
	public function up()
	{
		\DBUtil::create_table('server', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'user_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'https' => array('type' => 'int', 'null' => false, 'constraint' => 1),
			'url' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'port' => array('type' => 'int', 'null' => true, 'constraint' => 2),
			'token' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'lastcheck' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'name' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'plateforme' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'platformVersion' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'updatedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'version' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'online' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintServerUser ON ' . \DB::table_prefix('server') . '(`user_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintServerUser ON ' . \DB::table_prefix('server'))->execute();

		\DBUtil::drop_table('server');
	}
}