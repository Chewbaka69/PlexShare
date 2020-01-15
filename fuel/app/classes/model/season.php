<?php

use Fuel\Core\FuelException;

class Model_Season extends Model_Overwrite
{
    protected static $_table_name = 'season';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'tv_show_id',
        'plex_key',
        'number',
        'title',
        'thumb',
        'art',
        'leafCount',
        'addedAt',
        'updatedAt',
        'disable'
    );

    private $_episodes = null;

    private $_tv_show = null;
    private $_library = null;
    private $_server = null;

    public function getTvShow()
    {
        if(!$this->_tv_show)
            $this->_tv_show = Model_Tvshow::find_by_pk($this->tv_show_id);

        return $this->_tv_show;
    }

    public function getLibrary()
    {
        if(!$this->_library) {
            $tvshow = $this->getTvShow();
            $this->_library = Model_Library::find_by_pk($tvshow->library_id);
        }

        return $this->_library;
    }

    public function getServer()
    {
        if(!$this->_server) {
            $library = $this->getLibrary();
            $this->_server = Model_Server::find_by_pk($library->server_id);
        }

        return $this->_server;
    }

    public function getCover($width = null, $height = null)
    {
        if(!$this->_server)
            $this->getServer();

        $path_cache = null;
        $thumb = null;

        if(!$width && !$height)
            $path_cache = '.cover';
        else
            $path_cache = '.cover_' . $width . '_' . $height;

        try {
            $thumb = Cache::get($this->id . $path_cache);

            if ($thumb)
                return $thumb;
        } catch (CacheNotFoundException $e) {
            $this->getPicture($this->thumb, $path_cache, $width, $height);

            $thumb = Cache::get($this->id . $path_cache);
            return $thumb;
        }
    }

    private function getPicture($path, $path_cache, $width = null, $height = null)
    {
        if(!$this->_server)
            $this->getServer();

        $curl = null;

        if(!$width && !$height)
            $curl = Request::forge(($this->_server->https ? 'https' : 'http').'://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . $path . '?X-Plex-Token=' . $this->_server->token, 'curl');
        else
            $curl = Request::forge(($this->_server->https ? 'https' : 'http').'://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . '/photo/:/transcode?width='.$width.'&height='.$height.'&minSize=1&url='.$path.'&X-Plex-Token='.$this->_server->token, 'curl');

        if($this->_server->https) {
            $curl->set_options([
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false
            ]);
        }

        $curl->execute();

        if ($curl->response()->status !== 200)
            return false;

        Cache::set($this->id . $path_cache, $curl->response()->body);
    }

    /**
     * @param $server
     * @param $seasons
     * @param $tvshow
     * @return array
     * @throws FuelException
     */
    public static function BrowseSeason($server, $seasons, $tvshow)
    {
        try {
            $season_id_array = [];

            foreach ($seasons as $XMLseason) {
                $XMLseason = !isset($seasons['@attributes']) ? $XMLseason : $seasons;

                // Not browsing array ALL EPISODES
                if (isset($seasons[0]) && $seasons[0] === $XMLseason)
                    continue;

                $tvshow_id = $tvshow->id;

                $season = Model_Season::find(function ($query) use ($XMLseason, $tvshow_id) {
                    return $query
                        ->select('*')
                        ->where('plex_key', $XMLseason['@attributes']['ratingKey'])
                        ->and_where('tv_show_id', $tvshow_id);
                })[0] ?: Model_Season::forge();

                $season->set([
                    'tv_show_id' => $tvshow->id,
                    'plex_key' => $XMLseason['@attributes']['ratingKey'],
                    'number' => $XMLseason['@attributes']['index'],
                    'title' => $XMLseason['@attributes']['title'],
                    'thumb' => isset($XMLseason['@attributes']['thumb']) ? $XMLseason['@attributes']['thumb'] : null,
                    'art' => isset($XMLseason['@attributes']['art']) ? $XMLseason['@attributes']['art'] : null,
                    'leafCount' => isset($XMLseason['@attributes']['leafCount']) ? $XMLseason['@attributes']['leafCount'] : null,
                    'addedAt' => $XMLseason['@attributes']['addedAt'],
                    'updatedAt' => isset($XMLseason['@attributes']['updatedAt']) ? $XMLseason['@attributes']['updatedAt'] : null
                ]);

                $season->save();

                $season_id_array[] = ['id' => $season->id, 'name' => $season->title];

                if (isset($seasons['@attributes']))
                    break;
            }

            return $season_id_array;
        } catch (Exception $exception) {
            throw new FuelException($exception->getMessage(),$exception->getCode());
        }
    }

    /**
     * @param $server
     * @param $season
     * @return array|bool
     * @throws FuelException
     */
    public static function getMovies($server, $season)
    {
        try {
            $curl = Request::forge(($server->https ? 'https' : 'http').'://' . $server->url . ($server->port ? ':' . $server->port : '') . '/library/metadata/' . $season->plex_key . '/children?X-Plex-Token=' . $server->token, 'curl');

            if($server->https) {
                $curl->set_options([
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                ]);
            }

            $curl->execute();

            if ($curl->response()->status !== 200)
                return false;

            $movies = Format::forge($curl->response()->body, 'xml')->to_array();

            if (isset($movies['Video']))
                return ['movies' => Model_Movie::BrowseMovies($server, $movies['Video'], null, $season)];
        } catch (Exception $exception) {
            throw new FuelException($exception->getMessage(),$exception->getCode());
        }
    }

    public function getEpisodes()
    {
        $id = $this->id;

        if(!$this->_episodes)
            $this->_episodes = Model_Movie::find(function ($query) use ($id){
                return $query
                    ->select('*')
                    ->where('season_id', $id)
                    ->order_by('movie.number', 'ASC')
                    ;
            });

        return $this->_episodes;
    }
}