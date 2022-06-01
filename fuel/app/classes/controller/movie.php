<?php

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

    public function action_download()
    {
        try {
            $movie_id = $this->param('movie_id');

            if (!$movie_id)
                throw new FuelException('No movie id');

            $movie = Model_Movie::find_by_pk($movie_id);

            if (!$movie)
                throw new FuelException('No movie found');

            if (Model_Permission::isGranted('RIGHT_DOWNLOAD_DISABLED', $movie->getLibrary()))
                throw new FuelException('You dont have the permission to download in this library!');

            $url = $movie->getDownloadLink();

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
            $speed = 2000;

            File::readChunked($url, $speed);

            exit(200);
        } catch (Exception $exception) {
            return new Response($exception->getMessage(),500);
        }
    }


}