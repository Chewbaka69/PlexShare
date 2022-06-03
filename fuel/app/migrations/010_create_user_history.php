<?php

namespace Fuel\Migrations;

class Create_user_history
{
	public function up()
	{
		\DBUtil::create_table('user_history', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'user_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'movie_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'watching_time' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'ended_time' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'is_ended' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 1),
		), array('id'));

		\DB::query('CREATE INDEX constraintUserUserHistory ON ' . \DB::table_prefix('user_history') . '(`user_id`)')->execute();
		\DB::query('CREATE INDEX constraintMovieHistory ON ' . \DB::table_prefix('user_history') . '(`movie_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintUserUserHistory ON ' . \DB::table_prefix('user_history'))->execute();
		\DB::query('DROP INDEX constraintMovieHistory ON ' . \DB::table_prefix('user_history'))->execute();

		\DBUtil::drop_table('user_history');
	}
}