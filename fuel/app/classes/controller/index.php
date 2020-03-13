<?php

use Fuel\Core\Controller;
use Fuel\Core\Response;
use Fuel\Core\Session;

class Controller_Index extends Controller
{
    public function before()
    {
        $user = Session::get('user');
        if(!$user)
            Response::redirect('/login');
        else
            Response::redirect('/home');
    }
    public function action_index()
    {
        // DO NOTHING
    }
}