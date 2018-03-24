<?php

use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Admin extends Controller_Home
{
    public function before()
    {
        parent::before();

        $user = Session::get('user');

        if(!$user->admin)
            Response::redirect('/login');
    }

    public function action_index()
    {
        Response::forge(View::forge('admin/index'));
    }
}