<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\File;
use Fuel\Core\Input;
use Fuel\Core\Num;
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

            if (!$movie) {
                throw new FuelException('No movie found');
            }

            if (!Model_Permission::isGranted('RIGHT_WATCH_DISABLED', $movie->getLibrary())) {
                throw new FuelException('You dont have the permission to watch in this library!');
            }

            $user_settings = Model_User_Settings::find_one_by('user_id', Session::get('user')->id);

            if ($movie->type !== 'movie') {
                $episodes = $movie->getSeason()->getEpisodes();
            }
            else {
                $episodes = [$movie];
            }

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

            $watching = Model_User_History::find_one_by([
                            ['movie_id', '=', $movie_id],
                            ['user_id', '=', $user->id]
                        ]) ?: new Model_User_History();

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


    public function get_download() {
        try {

            $movie_id = Input::get('movie_id');

            if (!$movie_id)
                throw new FuelException('No movie id');

            /** @var Model_Movie $movie */
            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            if ( !Model_Permission::isGranted('RIGHT_DOWNLOAD_DISABLED', $movie->getLibrary()) )
                throw new FuelException('You dont have the permission to watch in this library!');

            $url = $movie->getDownloadLink();

            $filename = '';
            $size = 0;

            if(isset($this->metadata['Media'][0])) {
                $filename = $movie->getMetaData()['Media'][0]['Part']['@attributes']['file'];
                $size = $movie->getMetaData()['Media'][0]['Part']['@attributes']['size'];
            } else {
                $filename = $movie->getMetaData()['Media']['Part']['@attributes']['file'];
                $size = $movie->getMetaData()['Media']['Part']['@attributes']['size'];
            }

            $filename = explode('/', $filename);
            $filename = $filename[count($filename) - 1];

            ini_set('memory_limit', -1);
            ini_set('max_execution_time', -1);
            ini_set('max_input_time', -1);

            $this->headers = array (
                'Cache-Control'     => 'no-cache, no-store, max-age=0, must-revalidate',
                'Expires'           => 'Mon, 26 Jul 1997 05:00:00 GMT',
                'Pragma'            => 'no-cache',
                "Content-Description" => "File Transfer",
                "Content-Transfer-Encoding" => "binary",
                'Content-Type'      => 'application/octet-stream',
                'Content-Disposition' => 'inline; attachment; filename="'.$filename.'"',
                'Content-Length'     => $size
            );

            if(!File::exists(APPPATH.'tmp/'.$filename)) {
                $file = file_get_contents($url);
                File::create(APPPATH . 'tmp/', $filename, $file);
            }

            $file_info = File::file_info(APPPATH.'tmp/'.$filename);

            File::download(APPPATH.'tmp/'.$filename, $filename, $file_info['mimetype'], null, true);
        } catch (Exception $exception) {
            return $this->response($exception->getMessage(), 500);
        }
    }
}