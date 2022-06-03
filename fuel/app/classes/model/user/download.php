<?php

class Model_User_Download extends Model_Overwrite
{
    protected static $_table_name = 'user_download';
    protected static $_primary_key = 'id';
	protected static $_properties = array(
		"id",
		"user_id",
		"movie_id",
		"date"
	);

}
