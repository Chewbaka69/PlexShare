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

        if(!$user)
            Response::redirect('/login');

        $server = $sessionServer ? Model_Server::find_by_pk($sessionServer->id) : Model_Server::find_one_by('user_id', $user->id);

        if(!$server)
            Response::redirect('/login');

        //var_dump($sessionLibraries);die();

        $libraries = $server->getLibraries();

        $this->template->user = Session::get('user');
        $this->template->MenuServer = $server;
        $this->template->MenuLibraries = $libraries;

        $this->template->js_bottom = ['clappr.min.js', 'player.js'];
    }

    public function action_index()
    {
        $body = View::forge('home/index');

        $server_id = $this->param('server_id');

        if($server_id !== NULL) {
            $server = Model_Server::find_by_pk($server_id);

            if($server)
                $this->template->MenuServer = $server;
        }

        Session::delete('server');
        Session::set('server', $this->template->MenuServer);

        $this->template->MenuLibraries = $this->template->MenuServer->getLibraries();

        $episodes = Model_Movie::getThirtyLastedTvShows($this->template->MenuServer);

        $movies = Model_Movie::getThirtyLastedMovies($this->template->MenuServer);

        $body->set('episodes', $episodes);
        $body->set('movies', $movies);

        $this->template->body = $body;
    }
}