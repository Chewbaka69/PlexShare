<?php



class Model_User_Watching extends Model_Overwrite
{
    protected static $_table_name = 'user_watching';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'user_id',
        'movie_id',
        'watching_time',
        'ended_time',
        'isFinish'
    );

}
