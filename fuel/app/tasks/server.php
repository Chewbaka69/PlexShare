<?php

namespace Fuel\Tasks;

use Exception;
use Fuel\Core\FuelException;
use Model_Library;
use Model_Season;
use Model_Server;
use Model_Tvshow;
use function time;
use Fuel\Core\Request;

class Server
{
    public function ping()
    {
        $servers = Model_Server::find();

        foreach ($servers as $server) {
            try {
                $curl = Request::forge(($this->_server->https === '1' ? 'https' : 'http').'://' . $server->url . ($server->port ? ':' . $server->port : '') . '?X-Plex-Token=' . $server->token, 'curl');

                $curl->set_options([
                    CURLOPT_CONNECTTIMEOUT => 1
                ]);

                if($server->https === '1') {
                    $curl->set_options([
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => false
                    ]);
                }

                $curl->execute();

                if ($curl->response()->status !== 200)
                    throw new FuelException('No session found!');

                $server->set([
                    'lastcheck' => time(),
                    'online'    => 1
                ]);

                $server->save();
            } catch (Exception $exception) {
                $server->set([
                    'lastcheck' => time(),
                    'online'    => 0
                ]);

                $server->save();
            }
        }
    }

    public function browseServers()
    {
        $time = ini_get('max_execution_time');

        $servers = Model_Server::find_all();

        if($time > 0 && $time < ($servers * 5 * 60)) {
            ini_set('max_execution_time', 5 * $servers);
        }

        foreach ($servers as $server) {
            try {
                Model_Server::BrowseServeur([$server]);
            } catch (Exception $exception) {
                echo 'Server: ' . $server->name . ' ERROR: ' . $exception->getMessage() . "\n\r";
            }
            try {
                $this->browseLibraries($server);
            } catch (Exception $exception) {

            }
        }
    }

    private function browseLibraries($server)
    {
        Model_Library::BrowseLibraries($server);

        $this->browseSubContent($server);
    }

    private function browseSubContent($server)
    {
        $libraries = Model_Library::find_by('server_id',$server->id);

        foreach ($libraries as $library) {
            Model_Library::getSectionsContent($server, $library);
        }

        $this->browseTvShows($server);
    }

    private function browseTvShows($server)
    {
        $server_id = $server->id;

        $tv_shows = Model_Tvshow::find(function ($query) use ($server_id) {
            $query
                ->select('tvshow.*')
                ->join('library')
                ->on('tvshow.library_id', '=', 'library.id')
                ->where('library.server_id', $server_id)
            ;
        });

        foreach ($tv_shows as $tv_show) {
            Model_Tvshow::getTvShowSeasons($server,$tv_show);
        }

        $this->browseSeasons($server);
    }

    private function browseSeasons($server)
    {
        $server_id = $server->id;

        $seasons = Model_Season::find(function ($query) use ($server_id) {
            $query
                ->select('season.*')
                ->join('tvshow')
                ->on('season.tv_show_id', '=', 'tvshow.id')
                ->join('library')
                ->on('tvshow.library_id', '=', 'library.id')
                ->where('library.server_id', $server_id)
            ;
        });

        foreach ($seasons as $season) {
            Model_Season::getMovies($server,$season);
        }

        //$this->browseMovies($server);
    }
}
