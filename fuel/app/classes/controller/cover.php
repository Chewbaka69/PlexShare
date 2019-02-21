<?php

use Fuel\Core\Response;
use Fuel\Core\FuelException;

class Controller_Cover extends Controller_Home
{
    public function get_movie()
    {
        $movie_id = Input::get('movie_id');

        if(!$movie_id)
            throw new FuelException();

        $width = Input::get('width');
        $height = Input::get('height');

        $thumb = Input::get('thumb') ?: null;

        $movie = Model_Movie::find_by_pk($movie_id);

        if(!$movie)
            throw new FuelException();

        if(!$thumb)
            $images = $movie->getCover($width, $height);
        else
            $images = $movie->getThumb($width, $height);

        $response = new Response();
        $response->set_header('Content-Type', 'image/jpeg');
        $response->set_header('Content-Length',strlen($images));
        $response->body($images);

        return $response;
    }

    public function get_tvshow()
    {
        $tvshow_id = Input::get('tvshow_id');

        if(!$tvshow_id)
            throw new FuelException();

        $width = Input::get('width');
        $height = Input::get('height');

        $tv_show = Model_Tvshow::find_by_pk($tvshow_id);

        if(!$tv_show)
            throw new FuelException();

        $images = $tv_show->getCover($width, $height);

        $response = new Response();
        $response->set_header('Content-Type', 'image/jpeg');
        $response->set_header('Content-Length',strlen($images));
        $response->body($images);

        return $response;
    }

    public function get_season()
    {
        $season_id = Input::get('season_id');

        if(!$season_id)
            throw new FuelException();

        $width = Input::get('width');
        $height = Input::get('height');

        $thumb = Input::get('thumb') ?: null;

        $season = Model_Season::find_by_pk($season_id);

        if(!$season)
            throw new FuelException();

        if(!$thumb)
            $images = $season->getCover($width, $height);
        else
            $images = $season->getThumb($width, $height);

        $response = new Response();
        $response->set_header('Content-Type', 'image/jpeg');
        $response->set_header('Content-Length',strlen($images));
        $response->body($images);

        return $response;
    }
}