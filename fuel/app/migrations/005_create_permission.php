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

        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_WATCH_DISABLED'])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_DOWNLOAD_DISABLED'])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_TRAILER_DISABLED'])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_MAX_WATCH', 'parameters' => 1])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_MAX_QUALITY', 'parameters' => 1])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_MAX_CONCURRENT_STREAM', 'parameters' => 1])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_MAX_DOWNLOAD', 'parameters' => 1])->execute();
        \DB::insert('permission')->set(['id' => \Str::random('uuid'), 'name' => 'RIGHT_MAX_DOWNLOAD_SPEED', 'parameters' => 1])->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('permission');
	}
}