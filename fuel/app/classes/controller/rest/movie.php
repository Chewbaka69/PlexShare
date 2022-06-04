<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\DB;
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

            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            $user_id = Session::get('user')->id;

            $user_histories = Model_User_History::find(function ($query) use ($movie_id, $user_id) {
                $startOfDay = date("Y-m-d 00:00:00");
                $endOfDay = date("Y-m-d 23:59:59");
                $query->select(DB::expr('count(id) as count'))
                      ->where('user_id', $user_id)
                      ->and_where('movie_id', '<>', $movie_id)
                      ->and_where('date', '>=', strtotime($startOfDay))
                      ->and_where('date', '<=', strtotime($endOfDay))
                ;
            });

            if (Model_Permission::isGranted('RIGHT_WATCH_DISABLED', $movie->getLibrary()))
                throw new FuelException('You dont have the permission to watch in this library!');

            if (!Model_Permission::isGranted('RIGHT_MAX_WATCH', $movie->getLibrary(), $user_histories[0]->count))
                throw new FuelException('You have reach the maximum number of watch in this library for today!');

            $user_settings = Model_User_Settings::find_one_by('user_id', Session::get('user')->id);

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
            $user_id = Session::get('user')->id;
            $movie_id = Input::post('movie_id');
            $totaltime = Input::post('totaltime');
            $timeplay = Input::post('timeplay');
            $is_ended = Input::post('is_ended') === 'true';

            if (!$movie_id)
                throw new FuelException('No movie id');

            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            $user_histories = Model_User_History::find(function ($query) use ($movie_id, $user_id) {
                $startOfDay = date("Y-m-d 00:00:00");
                $endOfDay = date("Y-m-d 23:59:59");
                $query->select(DB::expr('count(id) as count'))
                      ->where('user_id', $user_id)
                      ->and_where('movie_id', '<>', $movie_id)
                      ->and_where('date', '>=', strtotime($startOfDay))
                      ->and_where('date', '<=', strtotime($endOfDay))
                ;
            });

            if (Model_Permission::isGranted('RIGHT_WATCH_DISABLED', $movie->getLibrary()))
                throw new FuelException('You dont have the permission to watch in this library!');

            if (!Model_Permission::isGranted('RIGHT_MAX_WATCH', $movie->getLibrary(), $user_histories[0]->count))
                throw new FuelException('You have reach the maximum number of watch in this library for today!');

            $watching = Model_User_History::find_one_by([
                                                ['movie_id', '=', $movie_id],
                                                ['user_id', '=', $user_id],
                                                ['is_ended', '=', 0]
                                            ]);

            $params = [];

            if($watching && $watching->date + (24 * 60 * 60) < time())
            {
                $watching->set(['is_ended' => $is_ended]);
                $watching->save();

                $watching = null;
            }

            if($watching === null){
                $watching = new Model_User_History();
                $params['date'] = time();
            }

            $params = array_merge($params, ['user_id'       => $user_id,
                        'movie_id'      => $movie_id,
                        'watching_time' => $timeplay,
                        'ended_time'    => $totaltime,
                        'is_ended'      => $is_ended]);

            $watching->set($params);

            $watching->save();

            return $this->response('OK', 200);

        } catch (Exception $exception) {
            return $this->response($exception->getMessage(), 500);
        }
    }
}