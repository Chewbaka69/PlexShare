<?php

namespace Fuel\Migrations;

class Add_originaltitle_to_tvshow
{
	public function up()
	{
		\DBUtil::add_fields('tvshow', array(
			'originalTitle' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('tvshow', array(
			'originalTitle'
		));
	}
}