<?php

use Fuel\Core\Controller;
use Fuel\Core\Response;
use Fuel\Core\Session;

class Controller_Logout extends Controller
{
    public function before()
    {
        parent::before();
        $user = Session::get('user');

        if(!$user)
            Response::redirect('/login');
    }

    public function action_index()
    {
        Session::delete('user');

        Response::redirect('/login');
    }
}