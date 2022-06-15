<?php

use Fuel\Core\Lang;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Admin_Users extends Controller_Admin
{
    public function action_index()
    {
        $this->template->js_bottom = ['plex_alert.js'];

        $body = View::forge('admin/users');

        $users = Model_User::find_all();

        $body->set('users', $users);

        $this->template->body = $body;
    }
}