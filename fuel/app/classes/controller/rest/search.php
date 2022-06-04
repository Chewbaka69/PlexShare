<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Database_Result;
use Fuel\Core\DB;
use Fuel\Core\Input;

class Controller_Rest_Search extends Controller_Rest
{
    public function get_index()
    {
        $search = '+'.implode('* +',
                              explode(' ',
                                      rtrim(Input::get('search'))
                              )
                    ).'*';

        $query = DB::query('SELECT * FROM '.DB::table_prefix('movie').'
                           WHERE MATCH('.DB::table_prefix('movie').'.`title`) AGAINST(:search  IN BOOLEAN MODE)
                           ORDER BY MATCH('.DB::table_prefix('movie').'.`title`) AGAINST(:search  IN BOOLEAN MODE) DESC LIMIT 6');
        $query->bind('search', $search);
        $movies = $query->execute();

        $query = DB::query('SELECT * FROM '.DB::table_prefix('tvshow').'
                           WHERE MATCH('.DB::table_prefix('tvshow').'.`title`) AGAINST(:search  IN BOOLEAN MODE)
                           ORDER BY MATCH('.DB::table_prefix('tvshow').'.`title`) AGAINST(:search  IN BOOLEAN MODE) DESC LIMIT 4');
        $query->bind('search', $search);
        $tv_shows = $query->execute();

        $results = [];

        foreach ($movies as $movie) {
            $data = [
                'id' => $movie['id'],
                'type' => $movie['type'],
                'title' => $movie['title'],
                'year' => $movie['type'] === 'movie' ? $movie['year'] : '',
                'tvshow' => $movie['tvshow'] ?? '',
            ];

            $results[] = $data;
        }

        foreach ($tv_shows as $movie) {
            $data = [
                'id' => $movie['id'],
                'type' => 'tvshow',
                'title' => $movie['title'],
                'year' => $movie['year'],
                'tvshow' => $movie['tvshow'] ?? '',
            ];

            $results[] = $data;
        }

        return $this->response($results);
    }
}