<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\View;
use Fuel\Core\FuelException;

class Controller_Rest_Movie extends Controller_Rest
{
    public function get_stream()
    {
        $movie_id = Input::get('movie_id');

        if(!$movie_id)
            throw new FuelException('No movie id');

        $movie = Model_Movie::find_by_pk($movie_id);

        if(!$movie)
            throw new FuelException('No movie found');

        $user_settings = Model_Settings::find_one_by('user_id', Session::get('user')->id);

        $view = View::forge('stream/index');

        $view->set('user_settings', $user_settings);
        $view->set('movie', $movie);

        return $this->response($view->render());
    }
}