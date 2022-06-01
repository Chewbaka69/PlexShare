<?php

namespace Fuel\Migrations;

class Create_season
{
	public function up()
	{
		\DBUtil::create_table('season', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'tv_show_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'plex_key' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'number' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'title' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'thumb' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'art' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'leafCount' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'addedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'updatedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintSeasonTvShow ON season(`tv_show_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintSeasonTvShow ON season')->execute();

		\DBUtil::drop_table('season');
	}
}