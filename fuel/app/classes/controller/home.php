<?php

use Fuel\Core\Lang;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Home extends Controller_Security
{
    public $template = 'layout/index';

    protected $_user;

    public function before()
    {
        parent::before();

        $user = Session::get('user');
        $sessionServer = Session::get('server');

        if(null === $user)
            Response::redirect('/login');

        $this->_user = $user;

        $server = $sessionServer ? Model_Server::find_by_pk($sessionServer->id) : Model_Server::find_one_by([
                ['online', '=', 1],
                ['disable', '=', 0],
            ]);

        Lang::load('menu');
        Lang::load('settings');

        $this->template->title = 'Home';

        $libraries = $server? $server->getLibraries() : null;

        $this->template->servers = Model_Server::find([
            'where' => [
                ['online', '=', 1],
                ['disable', '=', 0],
            ],
        ]);
        $this->template->user = Session::get('user');
        $this->template->MenuServer = $server;
        $this->template->MenuLibraries = $libraries;

        $this->template->js_bottom = ['clappr.min.js', 'player.js', 'plex_alert.js'];
    }

    public function action_index()
    {
        Lang::load('home');
        Lang::load('season');

        $body = View::forge('home/index');

        $server_id = $this->param('server_id');

        if ($server_id !== NULL) {
            $server = Model_Server::find_by_pk($server_id);

            if ($server)
                $this->template->MenuServer = $server;
        }

        Session::delete('server');
        Session::set('server', $this->template->MenuServer);

        $this->template->MenuLibraries = $this->template->MenuServer ? $this->template->MenuServer->getLibraries() : null;

        $watching_movies = Model_User_History::find_by([
            ['user_id', '=', $this->_user->id],
            ['is_ended', '=', 0]
        ]);

        $episodes = $this->template->MenuServer ? $this->template->MenuServer->getThirtyLastedTvShows() : null;

        $movies = $this->template->MenuServer ? $this->template->MenuServer->getThirtyLastedMovies() : null;

        $body->set('watching_movies', $watching_movies);
        $body->set('episodes', $episodes);
        $body->set('movies', $movies);

        $this->template->body = $body;
    }
}
