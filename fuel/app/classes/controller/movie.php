<?php

use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Movie extends Controller_Home
{
    public function action_index()
    {
        $movie_id = $this->param('movie_id');

        if(!$movie_id)
            Response::redirect('/home');

        $movie = Model_Movie::find_by_pk($movie_id);

        if(!$movie)
            Response::redirect('/home');

        $movie->getMetaData();

        $body = null;

        if($movie->type === 'movie')
            $body = View::forge('movie/movie');
        else if($movie->type === 'episode')
            $body = View::forge('movie/episode');

        $body->set('movie', $movie);

        $this->template->body = $body;
    }

    public function action_list()
    {
        $movies = Model_Movie::getList();

        if(!$movies)
            Response::redirect('/home');

        $body = View::forge('movie/list');

        $body->set('movies', $movies);

        $this->template->body = $body;
    }
}