<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Settings extends Controller_Template
{
    public $template = 'settings/body';

    public function before()
    {
        parent::before();
        $user = Session::get('user');

        if(!$user)
            Response::redirect('/login');

        $this->template->user = Session::get('user');

        $this->template->js_bottom = [];
    }

    public function action_index()
    {
        $body = View::forge('settings/index');

        $this->template->body = $body;
    }

    public function action_servers()
    {
        $this->template->js_bottom = ['plex_alert.js', 'server_refresh.js'];

        $body = View::forge('settings/servers');

        $user_id = Session::get('user')->id;

        $servers = Model_Server::find(function($query) use($user_id) {
            $query
                ->where('user_id', $user_id)
            ;
        });

        $body->set('servers', $servers);
        $body->set('user', Session::get('user'));

        $this->template->body = $body;
    }
}