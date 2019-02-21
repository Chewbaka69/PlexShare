<?php

class Controller_Season extends Controller_Home
{
    public function action_index()
    {
        $season_id = $this->param('season_id');

        $season = Model_Season::find_by_pk($season_id);

        if(!$season)
            Response::redirect('/home');


        $seasons = $season->getTvShow()->getSeasons();

        $this->template->title = $season->getTvShow()->title . ' S' . $season->number;

        $body = View::forge('season/index');

        $body->set('season', $season);
        $body->set('seasons', $seasons);

        $this->template->body = $body;
    }
}