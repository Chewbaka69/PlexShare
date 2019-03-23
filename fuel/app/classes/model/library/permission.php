<?php



class Model_Library_Permission extends Model_Overwrite
{
    protected static $_table_name = 'library_permission';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'permission_id',
        'library_id',
        'value',
        'disable'
    );

}