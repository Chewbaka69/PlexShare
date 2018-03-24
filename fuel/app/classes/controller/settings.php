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
        $body = View::forge('settings/servers');

        $servers = Model_Server::find_by('user_id',Session::get('user')->id);

        $body->set('servers', $servers);

        $this->template->body = $body;
    }
}