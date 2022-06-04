<?php

namespace Fuel\Migrations;

class Create_movie
{
	public function up()
	{
		\DBUtil::create_table('movie', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'library_id' => array('type' => 'varchar', 'null' => true, 'constraint' => 36),
			'season_id' => array('type' => 'varchar', 'null' => true, 'constraint' => 36),
			'plex_key' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'type' => array('type' => 'varchar', 'null' => false, 'constraint' => 20),
			'number' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'studio' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'title' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'originalTitle' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'summary' => array('type' => 'text', 'null' => true),
			'rating' => array('type' => 'varchar', 'null' => true, 'constraint' => 4),
			'year' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'thumb' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'art' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'duration' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'originallyAvailableAt' => array('type' => 'varchar', 'null' => true, 'constraint' => 11),
			'addedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'updatedAt' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'disable' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintMovieLibrary ON ' . \DB::table_prefix('movie') . '(`library_id`)')->execute();
		\DB::query('CREATE INDEX constraintMovieSeason ON ' . \DB::table_prefix('movie') . '(`season_id`)')->execute();
		\DB::query('CREATE FULLTEXT searchTitle ON ' . \DB::table_prefix('movie') . '(`title` DESC)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintMovieLibrary ON ' . \DB::table_prefix('movie'))->execute();
		\DB::query('DROP INDEX constraintMovieSeason ON ' . \DB::table_prefix('movie'))->execute();
		\DB::query('DROP FULLTEXT searchTitle ON ' . \DB::table_prefix('movie'))->execute();

		\DBUtil::drop_table('movie');
	}
}