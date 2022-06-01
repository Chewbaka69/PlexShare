<?php

namespace Fuel\Migrations;

class Create_library
{
	public function up()
	{
		\DBUtil::create_table('library', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'server_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'plex_key' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'type' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'updatedAt' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'createdAt' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'scannedAt' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintServerLibrary ON library(`server_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintServerLibrary ON library')->execute();

		\DBUtil::drop_table('library');
	}
}