<?php

use Fuel\Core\Lang;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Admin extends Controller_Security
{
    public $template = 'admin/body';

    public function before()
    {
        parent::before();
        $user = Session::get('user');

        if(!$user)
            Response::redirect('/login');

        if(!$user->admin)
            Response::redirect('/home');

        Lang::load('menu');
        Lang::load('action');

        $this->template->user = Session::get('user');

        $this->template->js_bottom = ['plex_alert.js'];
    }

    public function action_index()
    {
        $body = View::forge('admin/index');

        $this->template->body = $body;
    }

    public function action_servers()
    {
        $this->template->js_bottom = ['plex_alert.js', 'server_refresh.js'];

        $body = View::forge('admin/servers');

        $servers = Model_Server::find_all();

        $body->set('servers', $servers);

        $this->template->body = $body;
    }
}
