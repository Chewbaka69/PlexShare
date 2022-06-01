<?php

namespace Fuel\Migrations;

class Create_user_settings
{
	public function up()
	{
		\DBUtil::create_table('user_settings', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'user_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'language' => array('default' => 'english', 'type' => 'varchar', 'null' => false, 'constraint' => 36),
			'trailer_type' => array('default' => 'Upcoming', 'type' => 'varchar', 'null' => false, 'constraint' => 36),
			'trailer' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'subtitle' => array('default' => '100', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'maxdownloadspeed' => array('default' => '-1', 'type' => 'int', 'null' => false, 'constraint' => 11),
		), array('id'));

		\DB::query('CREATE INDEX constraintUserUserSetting ON user_settings(`user_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintUserUserSetting ON user_settings')->execute();

		\DBUtil::drop_table('user_settings');
	}
}