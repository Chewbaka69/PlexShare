<?php

class Model_User extends Model_Overwrite
{
    protected static $_table_name = 'user';
    protected static $_primary_key = 'id';
    protected static $_rules = array(
        'username' => 'required',
        'password' => 'required',
        'admin' => 'required',
        'lastlogin' => 'required',
    );
    protected static $_properties = array(
        'id',
        'username',
        'email',
        'password',
        'admin',
        'lastlogin',
        'disable',
    );

    public static function EmailAlreadyUse($email)
    {
        $result = self::find(function ($query) use ($email){
            return $query
                    ->where('user.email', $email)
                ;
        });

        if(count($result) > 0)
            return true;
        else
            return false;
    }

    public static function Login($login, $password)
    {
        $result = self::find_one_by(function ($query) use ($login,$password){
            return $query
                ->where('user.password', $password)
                ->and_where_open()
                ->where('user.email', $login)
                ->or_where('user.username', $login)
                ->and_where_close()
                ;
        });

        if(count($result) > 0)
            return $result;
        else
            return false;
    }
}