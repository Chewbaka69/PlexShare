<?php

use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Library extends Controller_Home
{
    public function action_index()
    {
        $library_id = $this->param('library_id');

        if(!$library_id)
            Response::redirect('/home');

        $library = Model_Library::find_by_pk($library_id);

        if(!$library)
            Response::redirect('/home');

        $body = View::forge('libraries/list');

        $content = null;

        if($library->type === 'movie') {
            $content = Model_Movie::find_by('library_id', $library->id);
        } else if($library->type === 'show') {
            $content = Model_Tvshow::find_by('library_id', $library->id);
        }

        $body->set('movies', $content);

        $this->template->body = $body;
    }
}