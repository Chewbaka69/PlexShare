<?php

namespace Fuel\Migrations;

class Create_tvshow
{
	public function up()
	{
		\DBUtil::create_table('tvshow', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'library_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'plex_key' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'studio' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'title' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'contentRating' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'summary' => array('type' => 'text', 'null' => true),
			'rating' => array('type' => 'varchar', 'null' => true, 'constraint' => 4),
			'year' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'thumb' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'art' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'banner' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'theme' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'originallyAvailableAt' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'leafCount' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'addedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'updatedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintTvShowLibrary ON ' . \DB::table_prefix('tvshow') . '(`library_id`)')->execute();
		\DB::query('CREATE INDEX searchTitle ON ' . \DB::table_prefix('tvshow') . '(`title` DESC)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintTvShowLibrary ON ' . \DB::table_prefix('tvshow'))->execute();
		\DB::query('DROP INDEX searchTitle ON ' . \DB::table_prefix('tvshow'))->execute();

		\DBUtil::drop_table('tvshow');
	}
}