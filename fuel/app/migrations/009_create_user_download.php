<?php

namespace Fuel\Migrations;

class Create_user_download
{
	public function up()
	{
		\DBUtil::create_table('user_download', array(
			'id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'user_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'movie_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 36),
			'date' => array('type' => 'int', 'null' => false, 'constraint' => 11),
		), array('id'));

		\DB::query('CREATE INDEX constraintDownloadUser ON ' . \DB::table_prefix('user_download') . '(`user_id`)')->execute();
		\DB::query('CREATE INDEX constraintDownloadMovie ON ' . \DB::table_prefix('user_download') . '(`movie_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX constraintDownloadUser ON ' . \DB::table_prefix('user_download'))->execute();
		\DB::query('DROP INDEX constraintDownloadMovie ON ' . \DB::table_prefix('user_download'))->execute();

		\DBUtil::drop_table('user_download');
	}
}