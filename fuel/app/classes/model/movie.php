<?php

use Fuel\Core\Config;
use Fuel\Core\DB;
use Fuel\Core\Format;
use Fuel\Core\Request;
use Fuel\Core\Cache;
use Fuel\Core\CacheNotFoundException;
use Fuel\Core\Database_Query_Builder_Select;
use Fuel\Core\FuelException;

class Model_Movie extends Model_Overwrite
{
    protected static $_table_name = 'movie';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'library_id',
        'season_id',
        'plex_key',
        'type',
        'number',
        'studio',
        'title',
        'originalTitle',
        'summary',
        'rating',
        'year',
        'thumb',
        'art',
        'duration',
        'originallyAvailableAt',
        'addedAt',
        'updatedAt',
        'disable'
    );

    public $metadata = [];

    private $_session = null;

    private $_season = null;
    private $_tv_show = null;
    private $_library = null;
    private $_server = null;

    public $trailer = null;

    public function getSeason()
    {
        if(!$this->_season)
            $this->_season = Model_Season::find_by_pk($this->season_id);

        return $this->_season;
    }

    public function getTvShow()
    {
        if(!$this->_tv_show) {
            $season = $this->getSeason();
            $this->_tv_show = Model_Tvshow::find_by_pk($season->tv_show_id);
        }

        return $this->_tv_show;
    }

    public function getLibrary()
    {
        if(!$this->_library) {
            if($this->type === 'episode') {
                $tvshow = $this->getTvShow();
                $this->_library = Model_Library::find_by_pk($tvshow->library_id);
            } else if($this->type === 'movie') {
                $this->_library = Model_Library::find_by_pk($this->library_id);
            }
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
            if($this->type === 'episode')
                $this->getPicture($this->_season->thumb,$path_cache, $width, $height);
            else if($this->type === 'movie')
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
            $curl = Request::forge('http://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . $path . '?X-Plex-Token=' . $this->_server->token, 'curl');
        else
            $curl = Request::forge('http://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . '/photo/:/transcode?width='.$width.'&height='.$height.'&minSize=1&url='.$path.'&X-Plex-Token='.$this->_server->token, 'curl');

        $curl->execute();

        if ($curl->response()->status !== 200)
            return false;

        Cache::set($this->id . $path_cache, $curl->response()->body);
    }

    public function getThumb($width = null, $height = null)
    {
        $path_cache = null;
        $thumb = null;

        if(!$width && !$height)
            $path_cache = '.preview';
        else
            $path_cache = '.preview_' . $width . '_' . $height;

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

    /**
     * @return array|mixed
     * @throws FuelException
     */
    public function getMetaData()
    {
        try {
            $this->metadata = Cache::get($this->id . '.metadata');
            if ($this->metadata)
                return $this->metadata;
        } catch (CacheNotFoundException $e) {
            if(!$this->_server)
                $this->getServer();

            $curl = Request::forge('http://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . $this->plex_key . '?X-Plex-Token=' . $this->_server->token, 'curl');
            $curl->execute();

            $array = Format::forge($curl->response()->body, 'xml')->to_array();

            //MEDIA
            $this->metadata['Media'] = $array['Video']['Media'];
            //GENRE
            $this->metadata['Genre'] = isset($array['Video']['Genre']) ? $array['Video']['Genre'] : null;
            //DIRECTOR
            $this->metadata['Director'] = isset($array['Video']['Director']) ? $array['Video']['Director'] : null;
            //WRITER
            $this->metadata['Writer'] = isset($array['Video']['Writer']) ? $array['Video']['Writer'] : null;
            //ROLES
            $this->metadata['Role'] = isset($array['Video']['Role']) ? $array['Video']['Role'] : null;

            $this->metadata['Stream'] = [];
            $this->metadata['Stream']['Video'] = [];
            $this->metadata['Stream']['Audio'] = [];
            $this->metadata['Stream']['SubTitle'] = [];

            if(isset($array['Video']['Media']['Part']['Stream'])) {
                foreach ($array['Video']['Media']['Part']['Stream'] as $stream) {
                    if($stream['@attributes']['streamType'] === '1')
                        $this->metadata['Stream']['Video'][] = $stream['@attributes'];
                    else if($stream['@attributes']['streamType'] === '2')
                        $this->metadata['Stream']['Audio'][] = $stream['@attributes'];
                    else if($stream['@attributes']['streamType'] === '3')
                        $this->metadata['Stream']['SubTitle'][] = $stream['@attributes'];
                }
            }

            Cache::set($this->id . '.metadata', $this->metadata);
            return $this->metadata;
        } catch (Exception $exception) {
            throw new FuelException($exception->getMessage(),$exception->getCode());
        }
    }

    public function getReleaseDate()
    {
        if(!$this->originallyAvailableAt)
            return null;

        $date = new DateTime($this->originallyAvailableAt);

        return $date->format('d F Y');
    }

    public function getDuration()
    {
        $init = $this->duration;

        $hours = floor($init / (3600 * 1000));
        $minutes = floor(($init / (60 * 1000)) % 60);

        return ($hours > 0 ? $hours . ' h ' : '') . $minutes . ' min';
    }

    public function getDurationMovie()
    {
        $init = $this->duration;

        $hours = floor($init / (3600 * 1000));
        $minutes = floor(($init / (60 * 1000)) % 60);
        $secondes = floor(($init - ($hours * 3600 * 1000) - ($minutes * 60 * 1000)) / 1000);

        return ($hours > 0 ? $hours . ':' : '') . ($minutes > 0 ? $minutes . ':' : '0:') . $secondes;
    }

    public function getStreamUrl()
    {
        try {
            if (!$this->_server)
                $this->getServer();

            $curl = Request::forge('http://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . '/video/:/transcode/universal/start.m3u8?identifier=[PlexShare]&path=http%3A%2F%2F127.0.0.1%3A32400' . urlencode($this->plex_key) . '&mediaIndex=0&partIndex=0&protocol=hls&offset=0&fastSeek=1&directStream=0&directPlay=1&videoQuality=100&maxVideoBitrate=2294&subtitleSize=100&audioBoost=100&X-Plex-Platform=Chrome&X-Plex-Token=' . $this->_server->token, 'curl');
            //$curl = Request::forge('http://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . '/video/:/transcode/universal/start?identifier=[PlexShare]&path=http%3A%2F%2F127.0.0.1%3A32400' . urlencode($this->plex_key) . '&mediaIndex=0&partIndex=0&protocol=hls&offset=0&fastSeek=1&directStream=0&directPlay=1&videoQuality=100&videoResolution=576x320&maxVideoBitrate=2294&subtitleSize=100&audioBoost=100&X-Plex-Platform=Chrome&X-Plex-Token=' . $this->_server->token, 'curl');
            $curl->execute();

            if ($curl->response()->status !== 200)
                throw new FuelException('No session found!');

            preg_match('/session\/[a-z0-9\-]+\/base\/index\.m3u8/', $curl->response()->body, $matches);

            if (count($matches) <= 0)
                throw new FuelException('No session found!');

            $split = preg_split('/\//', $matches[0]);

            if (count($split) <= 0)
                throw new FuelException('No session found!');

            $this->_session = $split[1];

            return 'http://' . $this->_server->url . ($this->_server->port ? ':' . $this->_server->port : '') . '/video/:/transcode/universal/session/' . $this->_session . '/base/index.m3u8';
        } catch (Exception $exception) {
            throw new FuelException('Cannot connect to the server.<br/>The token must be outdated!',$exception->getCode());
        }
    }

    /**
     * @param $server
     * @param $movies
     * @param null $library
     * @param null $season
     * @return bool
     * @throws Exception
     * @throws FuelException
     * @throws HttpNotFoundException
     * @throws \FuelException
     */
    public static function BrowseMovies($server, $movies, $library = null, $season = null)
    {
        $movies_id_array = [];

        foreach ($movies as $XMLmovie) {
            $XMLmovie = !isset($movies['@attributes']) ? $XMLmovie : $movies;

            $library_id = isset($library->id) ? $library->id : null;
            $season_id = isset($season->id) ? $season->id : null;

            $movie = Model_Movie::find(function ($query) use ($XMLmovie, $library_id, $season_id){
                /** @var Database_Query_Builder_Select $query */
                return $query
                    ->select('*')
                    ->where('plex_key', $XMLmovie['@attributes']['key'])
                    ->and_where_open()
                    ->where('season_id', $season_id)
                    ->and_where('library_id', $library_id)
                    ->and_where_close()
                    ;
            })[0] ?: Model_Movie::forge();

            if($library === null && $season === null)
                throw new FuelException('Missing Parameters for the movie');

            $movie->set([
                'library_id'            => $library ? $library->id : null,
                'season_id'             => $season ? $season->id : null,
                'plex_key'              => $XMLmovie['@attributes']['key'],
                'type'                  => $XMLmovie['@attributes']['type'],
                'number'                => isset($XMLmovie['@attributes']['index']) ? $XMLmovie['@attributes']['index'] : null,
                'studio'                => isset($XMLmovie['@attributes']['studio']) ? $XMLmovie['@attributes']['studio'] : null,
                'title'                 => $XMLmovie['@attributes']['title'],
                'originalTitle'         => isset($XMLmovie['@attributes']['originalTitle']) ? $XMLmovie['@attributes']['originalTitle'] : null,
                'summary'               => $XMLmovie['@attributes']['summary'],
                'rating'                => isset($XMLmovie['@attributes']['rating']) ? $XMLmovie['@attributes']['rating'] : null,
                'year'                  => isset($XMLmovie['@attributes']['year']) ? $XMLmovie['@attributes']['year'] : null,
                'thumb'                 => isset($XMLmovie['@attributes']['thumb']) ? $XMLmovie['@attributes']['thumb'] : null,
                'art'                   => isset($XMLmovie['@attributes']['art']) ? $XMLmovie['@attributes']['art'] : null,
                'duration'              => isset($XMLmovie['@attributes']['duration']) ? $XMLmovie['@attributes']['duration'] : null,
                'originallyAvailableAt' => isset($XMLmovie['@attributes']['originallyAvailableAt']) ? $XMLmovie['@attributes']['originallyAvailableAt'] : null,
                'addedAt'               => $XMLmovie['@attributes']['addedAt'],
                'updatedAt'             => $XMLmovie['@attributes']['updatedAt']
            ]);

            $movie->save();

            $movies_id_array[]= ['id' => $movie->id, 'name' => $movie->title];

            if(isset($movies['@attributes']))
                break;
        }

        return $movies_id_array;
    }

    public static function getMovieMetadata($server, $movie)
    {
        /*$curl = Request::forge('http://' . $server->url . ($server->port ? ':' . $server->port : '') . $movie->plex_key . '?X-Plex-Token=' . $server->token, 'curl');
            $curl->execute();

            if ($curl->response()->status !== 200)
                return false;

            $media = Format::forge($curl->response()->body, 'xml')->to_array();

            if(isset($movies['Video']))
                $this->getMovies($server, $movies['Video']);*/
    }

    public static function getThirtyLastedTvShows($server)
    {
        $conf = Config::get('db');

        return self::find(function ($query) use ($server, $conf) {
            /** @var Database_Query_Builder_Select $query */
            return $query
                ->select('movie.*', DB::expr('COUNT(' . $conf['default']['table_prefix'] . 'movie.type) AS count'))
                ->join('season', 'LEFT')
                ->on('movie.season_id', '=', 'season.id')
                ->join('tvshow', 'LEFT')
                ->on('season.tv_show_id', '=', 'tvshow.id')
                ->join('library', 'LEFT')
                ->on('tvshow.library_id', '=', 'library.id')
                ->join('server', 'LEFT')
                ->on('library.server_id', '=', 'server.id')
                ->where('server.id', $server->id)
                ->and_where('movie.type', 'episode')
                ->order_by('movie.addedAt', 'DESC')
                ->order_by(DB::expr('MAX(' . $conf['default']['table_prefix'] .'movie.addedAt)'), 'DESC ')//'movie.addedAt', 'DESC')
                ->group_by('movie.season_id')
                ->limit(30)
            ;
        });
    }

    public static function getThirtyLastedMovies($server)
    {
        return self::find(function ($query) use ($server) {
            /** @var Database_Query_Builder_Select $query */
            return $query
                ->select('movie.*')
                ->join('library', 'LEFT')
                ->on('movie.library_id', '=', 'library.id')
                ->join('server', 'LEFT')
                ->on('library.server_id', '=', 'server.id')
                ->where('server.id', $server->id)
                ->and_where('movie.type', 'movie')
                ->order_by('movie.addedAt', 'DESC')
                ->limit(30)
                ;
        });
    }

    public static function getList()
    {
        return self::find(function ($query) {
            /** @var Database_Query_Builder_Select $query */
            return $query
                ->select('*')
                ->where('type', 'movie')
                ->order_by('title', 'ASC')
                ;
        });
    }

    public function getTrailer()
    {
        if($this->type === 'movie') {

            $html = Request::forge('https://www.themoviedb.org/search/movie?query=' . urlencode($this->originalTitle ?: $this->title) . '+y%3A' . $this->year . '&language=us', 'curl');
            $html->execute();

            if ($html->response()->status !== 200)
                return false;

            $media = $html->response()->body;

            preg_match('/<a id="[a-z0-9_]*" data-id="[a-z0-9]*" data-media-type="movie" data-media-adult="[a-z]*" class="[a-z]*" href="(\/movie\/[\d]*\?language\=us)" title=".*" alt=".*">/i', $media, $urls);

            if (!isset($urls[1]))
                return false;

            $url = explode('?', $urls[1]);

            $html = Request::forge('https://www.themoviedb.org' . $url[0] . '/videos?active_nav_item=Trailers&video_language=en-US&language=en-US', 'curl');
            $html->set_options(array(
                    CURLOPT_FOLLOWLOCATION => true,
                )
            );
            $html->execute();

            if ($html->response()->status !== 200)
                return false;

            $media = $html->response()->body;

            preg_match('/<iframe type="text\/html" src="(\/\/www.youtube.com\/embed\/[a-zA-Z0-9\_]*\?enablejsapi\=1&autoplay\=0\&origin\=https%3A%2F%2Fwww\.themoviedb\.org\&hl\=en-US\&modestbranding\=1\&fs\=1)" frameborder\="0" allowfullscreen><\/iframe>/', $media, $youtube);

            if (!isset($youtube[1]))
                return false;

            $youtube = preg_replace('/\&origin\=https%3A%2F%2Fwww\.themoviedb\.org/i', '', $youtube[1]);

            $this->trailer = $youtube;
        }
    }
}