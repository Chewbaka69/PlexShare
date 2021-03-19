<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;
use Fuel\Core\Session;
use Fuel\Core\View;
use Fuel\Core\FuelException;

class Controller_Rest_Movie extends Controller_Rest
{
    public function get_stream()
    {
        try {

            $movie_id = Input::get('movie_id');

            if (!$movie_id)
                throw new FuelException('No movie id');

            /** @var Model_Movie $movie */
            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            if (!Model_Permission::isGranted('RIGHT_WATCH_DISABLED', $movie->getLibrary()))
                throw new FuelException('You dont have the permission to watch in this library!');

            $user_settings = Model_Setting::find_one_by('user_id', Session::get('user')->id);

            if ($movie->type !== 'movie')
                $episodes = $movie->getSeason()->getEpisodes();
            else
                $episodes = [$movie];

            $view = View::forge('player/index');

            $view->set('user_settings', $user_settings);
            $view->set('movie', $movie);
            $view->set('episodes', $episodes);

            return $this->response($view->render());
        } catch (Exception $exception) {
            return $this->response($exception->getMessage(), 500);
        }
    }

    public function post_watching()
    {
        try {
            $user = Session::get('user');
            $movie_id = Input::post('movie_id');
            $totaltime = Input::post('totaltime');
            $timeplay = Input::post('timeplay');
            $isFinish = Input::post('isFinish');

            $watching = Model_User_Watching::find_one_by([
                            ['movie_id', '=', $movie_id],
                            ['user_id', '=', $user->id]
                        ]) ?: new Model_User_Watching();

            $watching->set([
                'user_id' => $user->id,
                'movie_id' => $movie_id,
                'ended_time' => $totaltime,
                'watching_time' => $timeplay,
                'isFinish' => ($isFinish === 'true' ? true : false)
            ]);

            $watching->save();

            return $this->response('OK', 200);

        } catch (Exception $exception) {
            return $this->response($exception->getMessage(), 500);
        }
    }
}