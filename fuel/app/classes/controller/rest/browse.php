<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;
use Fuel\Core\Session;

class Controller_Rest_Browse extends Controller_Rest
{
    public function get_server()
    {
        $servers = Model_Server::find(array(
            'select' => array('id','name', 'url', 'port', 'token'),
            'where' => array(
                'id' => Input::get('server_id'),
            )
        ));

        $this->response($servers);
    }

    public function get_servers()
    {
        $servers = Model_Server::find(array(
            'select' => array('id','name'),
            'where' => array(
                'user_id' => Session::get('user')->id,
            )
        ));

        $this->response($servers);
    }

    public function put_server()
    {
        $server_id = Input::put('server_id');

        $server = Model_Server::find_by('id', $server_id);


        if(!$server)
            $this->response(array('error' => true, 'message' => 'No server found!'));

        Model_Server::BrowseServeur($server);

        $this->response(['error' => false, 'message' => 'Servers informations update!']);
    }

    public function get_libraries()
    {
        $server_id = Input::get('server_id');

        $server = Model_Server::find_by_pk($server_id);

        if(!$server)
            $this->response(array('error' => true, 'message' => 'No server found!'));

        $libraries = Model_Library::BrowseLibraries($server);

        if(!$libraries)
            $this->response(array('error' => true, 'message' => 'No library found!'));

        $this->response(['error' => false, 'libraries' => $libraries]);
    }

    public function get_subcontent()
    {
        $server_id = Input::get('server_id');
        $library_id = Input::get('library_id');

        $server = Model_Server::find_by_pk($server_id);
        $library = Model_Library::find_by_pk($library_id);

        if(!$server)
            $this->response(array('error' => true, 'message' => 'No server found!'));

        if(!$library)
            $this->response(array('error' => true, 'message' => 'No library found!'));

        return Model_Library::getSectionsContent($server, $library);
    }

    public function get_seasons()
    {
        $server_id = Input::get('server_id');
        $tvshow_id = Input::get('tvshow_id');

        $server = Model_Server::find_by_pk($server_id);
        $tvshow = Model_Tvshow::find_by_pk($tvshow_id);

        if(!$server)
            $this->response(array('error' => true, 'message' => 'No server found!'));

        if(!$tvshow)
            $this->response(array('error' => true, 'message' => 'No tvshow found!'));

        $seasons = Model_Tvshow::getTvShowSeasons($server,$tvshow);

        if(!$seasons)
            $this->response(array('error' => true, 'message' => 'No season found!'));

        $this->response(['error' => false, 'seasons' => $seasons]);
    }

    public function get_movies()
    {
        $server_id = Input::get('server_id');
        $season_id = Input::get('season_id');

        $server = Model_Server::find_by_pk($server_id);
        $season = Model_Season::find_by_pk($season_id);

        if(!$server)
            $this->response(array('error' => true, 'message' => 'No server found!'));

        if(!$season)
            $this->response(array('error' => true, 'message' => 'No season found!'));

        $movies = Model_Season::getMovies($server,$season);

        if(!$movies)
            $this->response(array('error' => true, 'message' => 'No movie found!'));

        $this->response(array_merge(['error' => false], $movies));
    }
}