<?php

class Model_Permission extends Model_Overwrite
{
    protected static $_table_name = 'permission';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'name',
        'disable'
    );
}