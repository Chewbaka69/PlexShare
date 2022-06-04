<?php

use Fuel\Core\Config;
use Fuel\Core\Input;
use Fuel\Core\Lang;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Settings extends Controller_Security
{
    public $template = 'settings/body';

    private $_user = null;

    public function before()
    {
        parent::before();

        $this->_user = Session::get('user');

        if(!$this->_user)
            Response::redirect('/login');

        Lang::load('menu');
        Lang::load('settings');
        Lang::load('action');

        $user_id = $this->_user->id;

        $servers = Model_Server::find(function($query) use($user_id) {
            $query
                ->where('user_id', $user_id)
            ;
        });

        $libraries = Model_Library::find(function($query) use($user_id) {
            $query
                ->select('library.*')
                ->join('server', 'LEFT')
                ->on('server.id', '=','library.server_id' )
                ->where('server.user_id', $user_id)
                ->and_where('server.disable', 0)
                ->and_where('server.online', 1)
            ;
        });

        $this->template->countServers = $servers ? count($servers) : 0;

        $this->template->countLibraries = $libraries ? count($libraries): 0;

        $this->template->servers = $servers;

        $this->template->libraries = $libraries;

        $this->template->user = $this->_user;

        $this->template->js_bottom = [];
    }

    public function action_index()
    {
        $body = View::forge('settings/index');

        $default_settings = Config::load('user_settings');

        $settings = Model_User_Settings::find_one_by('user_id', Session::get('user')->id);

        $is_submit = Input::post('submit');

        if(isset($is_submit)) {
            $settings = !empty($settings) ? $settings : new Model_User_Settings();
            $settings->set([
                'user_id'   => $this->_user->id,
                'language'  => Input::post('language'),
                'trailer_type'=> Input::post('typeTrailer'),
                'trailer'   => Input::post('trailerCount'),
                'subtitle'  => Input::post('subtitleSize'),
                'maxdownloadspeed'   => Input::post('maxdownloadspeed')
            ]);
            $settings->save();
        }

        $body->set('default_settings', $default_settings);
        $body->set('settings', $settings);

        $this->template->body = $body;
    }

    public function action_servers()
    {
        Lang::load('settings');

        $this->template->js_bottom = ['plex_alert.js', 'server_refresh.js'];

        $body = View::forge('settings/servers');

        $body->set('countServers',$this->template->countServers);
        $body->set('servers', $this->template->servers);
        $body->set('user', Session::get('user'));

        $this->template->body = $body;
    }
}