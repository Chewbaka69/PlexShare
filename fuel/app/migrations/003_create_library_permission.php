<?php

namespace Fuel\Migrations;

class Create_library_permission
{
	public function up()
	{
		\DBUtil::create_table('library_permission', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'permission_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'library_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'value' => array('type' => 'varchar', 'null' => true, 'constraint' => 36),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintPermissionLibrariesPermission ON library_permission(`permission_id`)')->execute();
		\DB::query('CREATE INDEX constraintLibraryLibrariesPermission ON library_permission(`library_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintPermissionLibrariesPermission ON library_permission')->execute();
		\DB::query('DROP INDEX constraintLibraryLibrariesPermission ON library_permission')->execute();

		\DBUtil::drop_table('library_permission');
	}
}