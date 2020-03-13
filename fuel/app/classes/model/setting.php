<?php

class Model_Setting extends Model_Overwrite
{
    protected static $_table_name = 'user_setting';
    protected static $_primary_key = 'id';
    protected static $_rules = array(
        'user_id' => 'required',
    );
    protected static $_properties = array(
        'id',
        'user_id',
        'language',
        'trailer_type',
        'trailer',
        'subtitle',
        'maxdownloadspeed',
    );
}