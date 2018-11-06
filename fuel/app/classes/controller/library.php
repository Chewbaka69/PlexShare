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
            $content = Model_Movie::find_by(function ($query) use ($library_id){
                $query->where('library_id', $library_id)
                    ->order_by('title', 'ASC')
                ;
            });
        } else if($library->type === 'show') {
            $content = Model_Tvshow::find_by(function ($query) use ($library_id){
                $query->where('library_id', $library_id)
                    ->order_by('title', 'ASC')
                ;
            });
        }

        $body->set('movies', $content);

        $this->template->body = $body;
    }
}