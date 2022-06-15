<?php

use Fuel\Core\Lang;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Settings_Libraries extends Controller_Settings
{
    public function action_index()
    {
        $this->template->js_bottom = ['plex_alert.js', 'server_refresh.js'];
        $this->template->css = ['settings.css'];

        $body = View::forge('settings/libraries');

        $body->set('countLibraries', $this->template->countLibraries);
        $body->set('libraries', $this->template->libraries);
        $body->set('user', Session::get('user'));

        $this->template->body = $body;
    }

    public function action_permissions()
    {
        $this->template->js_bottom = ['plex_alert.js'];

        Lang::load('permissions');

        $body = View::forge('settings/libraries/permissions');

        $library_id = $this->param('library_id');

        $library = Model_Library::find_by_pk($library_id);

        if($library === null)
            Response::redirect('/settings/libraries');

        $permissions = Model_Permission::find_by('disable', 0);

        $library_permissions = Model_Library_Permission::find_by('library_id', $library_id) ?: [];

        $temp = [];

        // ORDER ARRAY BY PERMISSION ID
        // MORE EASY TO DISPLAY
        foreach ($library_permissions as $library_permission) {
            $temp[$library_permission->permission_id] = $library_permission;
        }

        $library_permissions = $temp;

        $body->set('library', $library);
        $body->set('permissions', $permissions);
        $body->set('library_permissions', $library_permissions);
        $body->set('user', Session::get('user'));

        $this->template->body = $body;
    }
}