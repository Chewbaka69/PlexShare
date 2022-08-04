<?php

use Fuel\Core\DB;
use Fuel\Core\FuelException;
use Fuel\Core\Input;
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

        $this->template->title = $movie->title;

        $body->set('movie', $movie);

        $this->template->body = $body;
    }

    public function action_list()
    {
        $movies = Model_Movie::getAllMovies();

        if(!$movies)
            Response::redirect('/home');

        Lang::load('movie');

        $body = View::forge('movie/list');

        $this->template->title = 'Movie List';

        $body->set('movies', $movies);

        $this->template->body = $body;
    }

    public function action_download()
    {
        try {
            $movie_id = $this->param('movie_id');

            if (!$movie_id)
                throw new FuelException('No movie id');

            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            $user_id = $this->_user->id;

            $user_downloads = Model_User_Download::find(function ($query) use ($user_id) {
                $startOfDay = date("Y-m-d 00:00:00");
                $endOfDay = date("Y-m-d 23:59:59");
                $query->select(DB::expr('count(id) as count'))
                      ->where('user_id', $user_id)
                      ->and_where('date', '>=', strtotime($startOfDay))
                      ->and_where('date', '<=', strtotime($endOfDay))
                ;
            });

            if (Model_Permission::isGranted('RIGHT_DOWNLOAD_DISABLED', $movie->getLibrary()))
                throw new FuelException('You dont have the permission to download in this library!');

            if (!Model_Permission::isGranted('RIGHT_MAX_DOWNLOAD', $movie->getLibrary(), $user_downloads[0]->count))
                throw new FuelException('You have reach the maximum number of download in this library today!');

            $url = $movie->getDownloadLink();

            $download = Model_User_Download::forge(array(
                                          'user_id'     => $this->_user->id,
                                          'movie_id'    => $movie_id,
                                          'date'        => time()
                                      ));

            if(!$download->validates()) {
                throw new FuelException($download->validation()->show_errors());
            }

            $download->save();

            $filename = '';
            $size = 0;

            if(isset($movie->getMetaData()['Media'][0])) {
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

            header('Cache-control: no-cache, no-store, max-age=0, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Pragma: no-cache');
            header('Content-Description: File Transfer');
            header('Content-Transfer-Encoding: binary');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            header('Content-Length: '.$size);

            // @TODO: add it to admin panel and permission
            $speed = 5000;

            File::readChunked($url, $speed, 2048);

            exit(200);
        } catch (Exception $exception) {
            return new Response($exception->getMessage(),500);
        }
    }

    public function action_stream()
    {
        $movie_id = $this->param('movie_id');
        $transcode = $this->param('transcode');
        $session = $this->param('session');
        $index = $this->param('index');
        $base = $this->param('base');
        $extension = Input::extension();

        if (!$movie_id)
            throw new FuelException('No movie id');

        /** @var Model_Movie $movie */
        $movie = Model_Movie::find_by_pk($movie_id);

        if (!$movie)
            throw new FuelException('No movie found');

        $user_id = $this->_user->id;

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

        $url = ($movie->getServer()->https === '1' ? 'https' : 'http') . '://';
        $url .= $movie->getServer()->url . ($movie->getServer()->port ? ':' . $movie->getServer()->port : '') . '/';
        $url .= 'video/:/';
        $url .= 'transcode/' . $transcode . '/';
        $url .= 'session/' . $session . '/';
        $url .= $index . '/' . $base . '.' . $extension;

        readfile($url);
        exit;
    }
}