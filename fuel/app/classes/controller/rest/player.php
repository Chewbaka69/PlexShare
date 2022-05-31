<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;
use Fuel\Core\Session;
use Fuel\Core\View;
use Fuel\Core\FuelException;

class Controller_Rest_Player extends Controller_Rest
{
    public function put_movie()
    {
        try {
            $movie_id       = Input::put('movie_id');
            $watching_time  = Input::put('watching_time');
            $ended_time     = Input::put('ended_time');
            $user = Session::get('user');

            if (!$movie_id)
                throw new FuelException('No movie id');

            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            $user_watching = Model_User_History::find_one_by([
                ['movie_id', '=', $movie_id],
                ['movie_id', '=', $user->id]
            ]) ?: new Model_User_History();

            return $this->response(['error' => false, 'message' => 'OK!'], 200);
        } catch (Exception $exception) {
            return $this->response($exception->getMessage(), 500);
        }
    }
}