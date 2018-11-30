<?php

use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Settings_Libraries extends Controller_Settings
{
    public function action_index()
    {
        $this->template->js_bottom = ['plex_alert.js', 'server_refresh.js'];

        $body = View::forge('settings/libraries');

        $body->set('libraries', $this->template->libraries);
        $body->set('user', Session::get('user'));

        $this->template->body = $body;
    }

    public function action_permissions()
    {
        $this->template->js_bottom = ['plex_alert.js'];

        $body = View::forge('settings/libraries/permissions');

        $library_id = $this->param('library_id');

        $permissions = Model_Permission::find_all();

        $body->set('permissions', $permissions);
        $body->set('user', Session::get('user'));

        $this->template->body = $body;
    }
}