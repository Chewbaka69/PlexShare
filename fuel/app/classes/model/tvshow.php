<?php

use Fuel\Core\CacheNotFoundException;
use Fuel\Core\Debug;
use Fuel\Core\FuelException;

class Model_Tvshow extends Model_Overwrite
{
    protected static $_table_name = 'tvshow';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'library_id',
        'plex_key',
        'studio',
        'title',
        'contentRating',
        'summary',
        'rating',
        'year',
        'thumb',
        'art',
        'banner',
        'theme',
        'originallyAvailableAt',
        'leafCount',
        'addedAt',
        'updatedAt',
        'disable'
    );

    public $metadata = [];

    private $_seasons = null;

    private $_library = null;
    private $_server = null;

    public function getLibrary()
    {
        if(!$this->_library)
            $this->_library = Model_Library::find_by_pk($this->library_id);

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

        Cache::set($this->id . $path_cache, $curl->response()->body, 24 * 60 * 60);
    }

    public function getMetaData()
    {
        try {
            $this->metadata = Cache::get($this->id . '.metadata');

            if ($this->metadata)
                return $this->metadata;
        } catch (CacheNotFoundException $e) {
            if(!$this->_server)
                $this->getServer();

            $curl = Request::forge(($this->_server->https ? 'https' : 'http').'://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . '/library/metadata/' . $this->plex_key . '?X-Plex-Token=' . $this->_server->token, 'curl');

            if($this->_server->https) {
                $curl->set_options([
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                ]);
            }

            $curl->execute();

            $array = Format::forge($curl->response()->body, 'xml')->to_array();

            //GENRE
            $this->metadata['Genre'] = isset($array['Directory']['Genre']) ? $array['Directory']['Genre'] : null;
            //ROLES
            $this->metadata['Role'] = isset($array['Directory']['Role']) ? $array['Directory']['Role'] : null;

            Cache::set($this->id . '.metadata', $this->metadata, 7 * 24 * 60 * 60);
            return $this->metadata;
        }
    }

    /**
     * @param $server
     * @param $subsections
     * @param $library
     * @return bool | array
     * @throws Exception
     * @throws FuelException
     */
    public static function BrowseTvShow($server, $subsections, $library)
    {
        try {
            $tvshows_id_array = [];

            foreach ($subsections as $subsection) {
                $subsection = !isset($subsections['@attributes']) ? $subsection : $subsections;

                $library_id = $library->id;

                $tvshow = Model_Tvshow::find(function ($query) use ($subsection, $library_id) {
                    return $query
                        ->select('*')
                        ->where('plex_key', $subsection['@attributes']['ratingKey'])
                        ->and_where('library_id', $library_id);
                });

                $tvshow = $tvshow !== null ? $tvshow[0] : Model_Tvshow::forge();

                $tvshow->set([
                    'library_id' => $library->id,
                    'plex_key' => $subsection['@attributes']['ratingKey'],
                    'studio' => isset($subsection['@attributes']['studio']) ? $subsection['@attributes']['studio'] : null,
                    'title' => $subsection['@attributes']['title'],
                    'contentRating' => isset($subsection['@attributes']['contentRating']) ? $subsection['@attributes']['contentRating'] : null,
                    'summary' => isset($subsection['@attributes']['summary']) ? $subsection['@attributes']['summary'] : null,
                    'rating' => isset($subsection['@attributes']['rating']) ? $subsection['@attributes']['rating'] : null,
                    'year' => isset($subsection['@attributes']['year']) ? $subsection['@attributes']['year'] : null,
                    'thumb' => isset($subsection['@attributes']['thumb']) ? $subsection['@attributes']['thumb'] : null,
                    'art' => isset($subsection['@attributes']['art']) ? $subsection['@attributes']['art'] : null,
                    'banner' => isset($subsection['@attributes']['banner']) ? $subsection['@attributes']['banner'] : null,
                    'theme' => isset($subsection['@attributes']['theme']) ? $subsection['@attributes']['theme'] : null,
                    'originallyAvailableAt' => isset($subsection['@attributes']['originallyAvailableAt']) ? $subsection['@attributes']['originallyAvailableAt'] : null,
                    'leafCount' => isset($subsection['@attributes']['leafCount']) ? $subsection['@attributes']['leafCount'] : null,
                    'addedAt' => $subsection['@attributes']['addedAt'],
                    'updatedAt' => isset($subsection['@attributes']['updatedAt']) ? $subsection['@attributes']['updatedAt'] : null
                ]);

                $tvshow->save();

                $tvshows_id_array[] = ['id' => $tvshow->id, 'name' => $tvshow->title];

                //self::getTvShowSeasons($server, $tvshow);

                if (isset($subsections['@attributes']))
                    break;
            }

            return $tvshows_id_array;
        } catch (Exception $exception) {
            throw new FuelException($exception->getMessage(),$exception->getCode());
        }
    }

    /**
     * @param $server
     * @param $tvshow
     * @return array|bool
     * @throws FuelException
     */
    public static function getTvShowSeasons($server, $tvshow)
    {
        try {
            $curl = Request::forge(($server->https ? 'https' : 'http').'://' . $server->url . ($server->port ? ':' . $server->port : '') . '/library/metadata/' . $tvshow->plex_key . '/children?X-Plex-Token=' . $server->token, 'curl');

            if($server->https) {
                $curl->set_options([
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                ]);
            }

            $curl->execute();

            if ($curl->response()->status !== 200)
                return false;

            $seasons = Format::forge($curl->response()->body, 'xml')->to_array();

            if ($seasons !== null && isset($seasons['Directory']))
                return Model_Season::BrowseSeason($server, $seasons['Directory'], $tvshow);
        } catch (Exception $exception) {
            throw new FuelException($exception->getMessage(),$exception->getCode());
        }
    }

    public function getSeasons()
    {
        if(!$this->_seasons) {
            $id = $this->id;
            $this->_seasons = Model_Season::find_by(function ($query) use ($id) {
                $query
                    ->where('tv_show_id', $id)
                    ->order_by('number', 'ASC')
                ;
            });
        }

        return $this->_seasons;
    }
}