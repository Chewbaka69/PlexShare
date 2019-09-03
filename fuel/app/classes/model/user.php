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
        $result = self::find_by(function ($query) use ($login,$password){
            return $query
                ->where('password', $password)
                ->and_where('parent_id', null)
                ->and_where_open()
                ->where('email', $login)
                ->or_where('username', $login)
                ->and_where_close()
                ;
        });

        if(count($result) > 0)
            return $result[0];
        else
            return false;
    }

    public function getLastLogin()
    {
        $dateString = date('Y/m/d H:i:s', time());
        $now = new DateTime($dateString);

        $dateString = date('Y-m-d H:i:s', $this->lastlogin);
        $time = new DateTime($dateString);

        $diff = date_diff($now, $time);

        $days = $diff->days . 'd ';
        $hours = $diff->h . 'h ';
        $minutes = $diff->i . 'min ';
        $seconds = $diff->s . 's';

        return $days.$hours.$minutes.$seconds;
    }
}