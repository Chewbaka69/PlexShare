<?php

use Fuel\Core\Database_Query_Builder_Select;
use Fuel\Core\DB;
use Fuel\Core\Debug;
use Fuel\Core\Request;
use Fuel\Core\Format;
use Fuel\Core\Response;

class Model_Server extends Model_Overwrite
{
    protected static $_table_name = 'server';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'user_id',
        'https',
        'url',
        'port',
        'token',
        'lastcheck',
        'name',
        'plateforme',
        'platformVersion',
        'updatedAt',
        'version',
        'online',
        'disable'
    );

    public function getLastCheck()
    {
        $dateString = date('Y/m/d H:i:s', time());
        $now = new DateTime($dateString);

        $dateString = date('Y-m-d H:i:s', $this->lastcheck);
        $time = new DateTime($dateString);

        $diff = date_diff($now, $time);

        $days = $diff->days . 'd ';
        $hours = $diff->h . 'h ';
        $minutes = $diff->i . 'min ';
        $seconds = $diff->s . 's';

        return $days.$hours.$minutes.$seconds;
    }

    //$curl = Request::forge('http://' . $config['main']['server'] . ':' . $config['main']['port'] . '/:/prefs?X-Plex-Token=' . $config['main']['token'], 'curl');

    /**
     * Browse the list of server registered
     * @param null $_servers
     * @throws Exception
     * @throws HttpNotFoundException
     * @throws \FuelException
     */
    public static function BrowseServeur($_servers = null)
    {
        $servers = $_servers ?: Model_Server::find_all();

        foreach ($servers as $server) {

            try{
                if($server->disable)
                    continue;

                $curl = Request::forge(($server->https ? 'https' : 'http').'://' . $server->url . ($server->port? ':' . $server->port : '') . '/?X-Plex-Token=' . $server->token, 'curl');

                if($server->https) {
                    $curl->set_options([
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => false
                    ]);
                }

                $curl->execute();

                $dataServer = Format::forge($curl->response()->body, 'xml')->to_array();

                if (!isset($dataServer['@attributes'])) {
                    $server->set(['online' => 0]);
                    $server->save();
                }

                $dataServer = $dataServer['@attributes'];

                $server->set(['lastcheck' => time()]);

                ($server->name              !== $dataServer['friendlyName'])     ? $server->set(['name'              => $dataServer['friendlyName']])      : null;
                ($server->plateforme        !== $dataServer['platform'])         ? $server->set(['plateforme'        => $dataServer['platform']])          : null;
                ($server->platformVersion   !== $dataServer['platformVersion'])  ? $server->set(['platformVersion'   => $dataServer['platformVersion']])   : null;
                ($server->updatedAt         !== $dataServer['updatedAt'])        ? $server->set(['updatedAt'         => $dataServer['updatedAt']])         : null;
                ($server->version           !== $dataServer['version'])          ? $server->set(['version'           => $dataServer['version']])           : null;

                $server->set(['online' => 1]);

                $server->save();
            }catch (Exception $exception) {
                $server->set(['online' => 0]);
                $server->save();
                throw new FuelException($exception->getMessage(),$exception->getCode());
            }
        }
    }

    public function getLibraries()
    {
        $id = $this->id;

        $libraries =  Model_Library::find(function ($query) use ($id)
        {
            return $query
                    ->where('server_id', $id)
                    ->order_by('createdAt', 'ASC')
                ;
        });

        return $libraries;
    }

    public function getThirtyLastedTvShows()
    {
        try {
            $curl = Request::forge(($this->https === '1' ? 'https' : 'http').'://' . $this->url . ($this->port ? ':' . $this->port : '') . '/hubs/home/recentlyAdded?type=2&X-Plex-Token=' . $this->token, 'curl');

            if($this->https) {
                $curl->set_options([
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                ]);
            }

            $curl->set_header('Accept', 'application/json');

            $curl->execute();

            $body = json_decode($curl->response()->body);

            $datas = $body->MediaContainer->Metadata;
            $datas = array_slice($datas, 0,50);

            $tvshows = [];

            foreach ($datas as $tvshow) {
                if($tvshow->type === 'season') {
                    $tvshows[] = Model_Season::find_one_by('plex_key', $tvshow->ratingKey) ?: new Model_Season();

                } else if($tvshow->type === 'episode') {
                    $tvshows[] = Model_Movie::find_one_by('plex_key', $tvshow->key) ?: new Model_Movie();
                }
            }

            return $tvshows;

        }catch (Exception $exception){
            Debug::dump($exception);
        }

        //return self::find(function ($query) use ($server) {
        /** @var Database_Query_Builder_Select $query */
        /*return $query
            ->select('movie.*', DB::expr('COUNT(' . DB::table_prefix('movie') . '.type) AS count'))
            ->join('season', 'LEFT')
            ->on('movie.season_id', '=', 'season.id')
            ->join('tvshow', 'LEFT')
            ->on('season.tv_show_id', '=', 'tvshow.id')
            ->join('library', 'LEFT')
            ->on('tvshow.library_id', '=', 'library.id')
            ->join('server', 'LEFT')
            ->on('library.server_id', '=', 'server.id')
            ->where('server.id', $server->id)
            ->and_where('server.online', 1)
            ->and_where('server.disable', 0)
            ->and_where('library.disable', 0)
            ->and_where('tvshow.disable', 0)
            ->and_where('season.disable', 0)
            ->and_where('movie.disable', 0)
            ->and_where('movie.type', 'episode')
            ->order_by('movie.addedAt', 'DESC')
            ->order_by(DB::expr('MAX(' . DB::table_prefix('movie') .'.addedAt)'), 'DESC ')//'movie.addedAt', 'DESC')
            ->group_by('movie.season_id')
            ->limit(30)
        ;
    });*/
    }

    public function getThirtyLastedMovies()
    {
        try {
            $curl = Request::forge(($this->https === '1' ? 'https' : 'http').'://' . $this->url . ($this->port ? ':' . $this->port : '') . '/hubs/home/recentlyAdded?type=1&X-Plex-Token=' . $this->token, 'curl');

            if($this->https) {
                $curl->set_options([
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                ]);
            }

            $curl->set_header('Accept', 'application/json');

            $curl->execute();

            $body = json_decode($curl->response()->body);

            $datas = $body->MediaContainer->Metadata;
            $datas = array_slice($datas, 0,50);

            $movies = [];

            foreach ($datas as $movie) {
                $movies[] = Model_Movie::find_one_by('plex_key', $movie->key) ?: new Model_Movie();
            }

            return $movies;

        }catch (Exception $exception){
            Debug::dump($exception);
        }
        //return Model_Movie::find(function ($query) use ($server) {
            /** @var Database_Query_Builder_Select $query */
            /*return $query
                ->select('movie.*')
                ->join('library', 'LEFT')
                ->on('movie.library_id', '=', 'library.id')
                ->join('server', 'LEFT')
                ->on('library.server_id', '=', 'server.id')
                ->where('server.id', $server->id)
                ->and_where('movie.disable', 0)
                ->and_where('movie.type', 'movie')
                ->order_by('movie.addedAt', 'DESC')
                ->limit(30)
                ;
        });*/
    }
}