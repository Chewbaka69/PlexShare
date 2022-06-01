<?php

namespace Fuel\Migrations;

class Create_configurations
{
	public function up()
	{
		\DBUtil::create_table('configurations', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'data' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('configurations');
	}
}