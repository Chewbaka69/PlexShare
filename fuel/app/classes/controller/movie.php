<?php

use Fuel\Core\Lang;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Movie extends Controller_Home
{
    public function action_index()
    {
        $movie_id = $this->param('movie_id');

        if(!$movie_id)
            Response::redirect('/home');

        Lang::load('movie');
        Lang::load('action');

        $body = View::forge('movie/index');

        $movie = Model_Movie::find_by_pk($movie_id);

        if(!$movie)
            Response::redirect('/home');

        $movie->getTrailer();

        $this->template->title = $movie->title;

        $body->set('movie', $movie);

        $this->template->body = $body;
    }

    public function action_list()
    {
        $movies = Model_Movie::getList();

        if(!$movies)
            Response::redirect('/home');

        Lang::load('movie');

        $body = View::forge('movie/list');

        $this->template->title = 'Movie List';

        $body->set('movies', $movies);

        $this->template->body = $body;
    }
}