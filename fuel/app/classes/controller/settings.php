<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Settings extends Controller_Template
{
    public $template = 'settings/body';

    private $_user = null;

    public function before()
    {
        parent::before();
        $this->_user = Session::get('user');

        if(!$this->_user)
            Response::redirect('/login');

        $this->template->user = $this->_user;

        $this->template->js_bottom = [];
    }

    public function action_index()
    {
        $settings = Model_Settings::find_one_by('user_id', Session::get('user')->id);

        $is_submit = Input::post('submit');

        if(isset($is_submit)) {
            $settings = !empty($settings) ? $settings : new Model_Settings();
            $settings->set([
                'user_id'   => $this->_user->id,
                'language'  => Input::post('language'),
                'trailer_type'=> Input::post('typeTrailer'),
                'trailer'   => Input::post('trailerCount'),
                'subtitle'  => Input::post('subtitleSize'),
                'quality'   => Input::post('remoteQuality')
            ]);
            $settings->save();
        }

        $body = View::forge('settings/index');
        $body->set('settings', $settings);

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