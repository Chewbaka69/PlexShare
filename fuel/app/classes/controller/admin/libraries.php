<?php

use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Admin_Libraries extends Controller_Admin
{
    public function action_index()
    {
        $this->template->js_bottom = ['plex_alert.js', 'server_refresh.js'];

        $body = View::forge('admin/libraries');

        $libraries = Model_Library::find_all();

        $body->set('libraries', $libraries);

        $this->template->body = $body;
    }
}