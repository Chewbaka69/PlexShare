<?php

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

        $episode->getMetaData();

        $body = View::forge('episode/index');
        $body->set('episode', $episode);

        $this->template->body = $body;
    }
}