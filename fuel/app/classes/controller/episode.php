<?php

use Fuel\Core\Lang;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Episode extends Controller_Home
{
    public function action_index()
    {
        $episode_id = $this->param('episode_id');

        if(!$episode_id)
            Response::redirect('/home');

        $episode = Model_Movie::find_by_pk($episode_id);

        if(!$episode)
            Response::redirect('/home');

        Lang::load('movie');
        Lang::load('action');

        $body = View::forge('episode/index');

        $this->template->title = $episode->getTvShow()->title . ' S' . $episode->getSeason()->number . ' - E' .$episode->number . ' ' . $episode->title;

        $seasons = $episode->getTvShow()->getSeasons();
        $episodes = $episode->getSeason()->getEpisodes();
        $subtitles = $episode->getMetaData()['Stream']['SubTitle'];

        $body->set('episode', $episode);
        $body->set('seasons', $seasons);
        $body->set('episodes', $episodes);
        $body->set('subtitles', $subtitles);

        $this->template->body = $body;
    }
}