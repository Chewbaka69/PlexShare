<?php

use Fuel\Core\Controller_Rest;

class Controller_Rest_Index extends Controller_Rest
{
    public function  before()
    {
        $user = Session::get('user');

        if(!$user)
            Response::redirect('/login');
    }
}