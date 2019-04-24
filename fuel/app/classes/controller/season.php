<?php

use Fuel\Core\Lang;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Season extends Controller_Home
{
    public function action_index()
    {
        $season_id = $this->param('season_id');

        $season = Model_Season::find_by_pk($season_id);

        if(!$season)
            Response::redirect('/home');

        Lang::load('movie');
        Lang::load('season');
        Lang::load('action');

        $body = View::forge('season/index');

        $seasons = $season->getTvShow()->getSeasons();

        $this->template->title = $season->getTvShow()->title . ' S' . $season->number;

        $body->set('season', $season);
        $body->set('seasons', $seasons);

        $this->template->body = $body;
    }
}