<?php

use Fuel\Core\Controller;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;
use Fuel\Core\Asset;
use Fuel\Core\Input;
use Fuel\Core\Config;
use Fuel\Core\FuelException;

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