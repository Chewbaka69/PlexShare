<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;
use Fuel\Core\Session;

class Controller_Rest_Browse extends Controller_Rest
{
    public function get_server()
    {
        if(!Session::get('user')->admin) {
            $server = Model_Server::find(array(
                'select' => array('id', 'name', 'url', 'port', 'token'),
                'where' => array(
                    'id' => Input::get('server_id'),
                    'user_id' => Session::get('user')->id
                )
            ));
        } else {
            $server = Model_Server::find(array(
                'select' => array('id', 'name', 'url', 'port', 'token'),
                'where' => array(
                    'id' => Input::get('server_id')
                )
            ));
        }

        if(!$server)
            return $this->response(array('error' => true, 'message' => 'No server found!'));

        $this->response($server);
    }

    public function get_library()
    {
        $library_id = Input::get('library_id');

        $library = Model_Library::find_one_by(function($query) use ($library_id) {
            $query
                ->select_array([
                    'library.*',
                    ['server.id', 'server_id'],
                    ['server.name', 'server_name']
                ])
                ->join('server', 'LEFT')
                ->on('server.id', '=','library.server_id' )
                ->where('server.user_id', Session::get('user')->id)
                ->and_where('library.id', $library_id)
                ->and_where('server.disable', 0)
            ;
        });

        if(!$library)
            return $this->response(array('error' => true, 'message' => 'No server found!'));

        $this->response($library);
    }

    public function get_my_servers()
    {
        $servers = Model_Server::find(array(
            'select' => array('id','name'),
            'where' => array(
                'user_id' => Session::get('user')->id,
            )
        ));

        return $this->response($servers);
    }

    public function put_server()
    {
        try {
            $server_id = Input::put('server_id');

            $server = Model_Server::find_by('id', $server_id);

            if (!$server)
                return $this->response(array('error' => true, 'message' => 'No server found!'));

            Model_Server::BrowseServeur($server);

            return $this->response(['error' => false, 'message' => 'Servers informations update!']);
        } catch (Exception $e) {
            return $this->response(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function get_libraries()
    {
        $server_id = Input::get('server_id');

        $server = Model_Server::find_by_pk($server_id);

        if(!$server)
            return $this->response(array('error' => true, 'message' => 'No server found!'));

        $libraries = Model_Library::BrowseLibraries($server);

        if(!$libraries)
            return $this->response(array('error' => true, 'message' => 'No library found!'));

        $this->response(['error' => false, 'libraries' => $libraries]);
    }

    public function get_subcontent()
    {
        $server_id = Input::get('server_id');
        $library_id = Input::get('library_id');

        $server = Model_Server::find_by_pk($server_id);
        $library = Model_Library::find_by_pk($library_id);

        if(!$server)
            return $this->response(array('error' => true, 'message' => 'No server found!'));

        if(!$library)
            return $this->response(array('error' => true, 'message' => 'No library found!'));

        return Model_Library::getSectionsContent($server, $library);
    }

    public function get_seasons()
    {
        $server_id = Input::get('server_id');
        $tvshow_id = Input::get('tvshow_id');

        $server = Model_Server::find_by_pk($server_id);
        $tvshow = Model_Tvshow::find_by_pk($tvshow_id);

        if(!$server)
            return $this->response(array('error' => true, 'message' => 'No server found!'));

        if(!$tvshow)
            return $this->response(array('error' => true, 'message' => 'No tvshow found!'));

        $seasons = Model_Tvshow::getTvShowSeasons($server,$tvshow);

        if(!$seasons)
            return $this->response(array('error' => true, 'message' => 'No season found!'));

        $this->response(['error' => false, 'seasons' => $seasons]);
    }

    public function get_movies()
    {
        $server_id = Input::get('server_id');
        $season_id = Input::get('season_id');

        $server = Model_Server::find_by_pk($server_id);
        $season = Model_Season::find_by_pk($season_id);

        if(!$server)
            return $this->response(array('error' => true, 'message' => 'No server found!'));

        if(!$season)
            return $this->response(array('error' => true, 'message' => 'No season found!'));

        $movies = Model_Season::getMovies($server,$season);

        if(!$movies)
            return $this->response(array('error' => true, 'message' => 'No movie found!'));

        $this->response(array_merge(['error' => false], $movies));
    }
}