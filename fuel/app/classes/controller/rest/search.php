<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Database_Result;
use Fuel\Core\DB;
use Fuel\Core\Input;

class Controller_Rest_Search extends Controller_Rest
{
    public function get_index()
    {
        $search = '%'.Input::get('search').'%';

        $query = DB::query('SELECT * FROM '.DB::table_prefix('movie').' WHERE '.DB::table_prefix('movie').'.type = :type AND ('.DB::table_prefix('movie').'.`title` LIKE :search OR MATCH('.DB::table_prefix('movie').'.`title`) AGAINST(:search)) ORDER BY MATCH('.DB::table_prefix('movie').'.`title`) AGAINST(:search) DESC LIMIT 5');

        $query->bind('search', $search);

        $query->param('type', 'movie');
        $search_movie = $query->execute();

        $query->param('type', 'episode');
        $search_episode = $query->execute();

        return $this->response(['movies' => $search_movie, 'episodes' => $search_episode]);
    }
}