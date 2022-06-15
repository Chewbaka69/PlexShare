<?php

namespace Fuel\Migrations;

class Create_permission
{
	public function up()
	{
		\DBUtil::create_table('permission', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'parameters' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('permission');
	}
}