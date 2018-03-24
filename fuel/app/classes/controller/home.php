<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Home extends Controller_Template
{
    public $template = 'layout/index';

    public function before()
    {
        parent::before();
        $user = Session::get('user');
        $sessionServer = Session::get('server');
        $sessionLibraries = Session::get('libraries');

        if(!$user)
            Response::redirect('/login');

        $server = $sessionServer ? Model_Server::find_by_pk($sessionServer->id) : Model_Server::find_all()[0];

        if(!$server)
            Response::redirect('/login');

        $libraries = $sessionLibraries ?: $server->getLibraries();

        $this->template->user = Session::get('user');
        $this->template->server = $server;
        $this->template->libraries = $libraries;

        $this->template->js_bottom = ['clappr.min.js', 'player.js'];
    }

    public function action_index()
    {
        $body = View::forge('home/index');

        $server_id = $this->param('server_id');

        if($server_id) {
            $server = Model_Server::find_by_pk($server_id);

            if($server)
                $this->template->server = $server;
        }

        $this->template->libraries = $this->template->server->getLibraries();

        Session::set('server', $this->template->server);
        Session::set('libraries', $this->template->libraries);

        $episodes = Model_Movie::getThirtyLastedTvShows($this->template->server);

        $movies = Model_Movie::getThirtyLastedMovies($this->template->server);

        $body->set('episodes', $episodes);
        $body->set('movies', $movies);

        $this->template->body = $body;
    }
}