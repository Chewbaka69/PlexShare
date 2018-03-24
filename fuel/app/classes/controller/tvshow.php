<?php

class Controller_Tvshow extends Controller_Home
{
    public function action_index()
    {
        $tvshow_id = $this->param('tvshow_id');

        $tvshow = Model_Tvshow::find_by_pk($tvshow_id);

        if(!$tvshow)
            Response::redirect('/home');

        $tvshow->getMetaData();

        $body = View::forge('tvshow/index');

        $body->set('tvshow', $tvshow);

        $this->template->body = $body;
    }
}