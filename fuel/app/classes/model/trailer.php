<?php

use Fuel\Core\Debug;

class Model_Trailer
{
    private $_movie_id;

    private $_title;

    private $_year;

    private $_type;

    private $_trailer;

    private $_trailer_url;

    public function __construct($movie_id, $title, $year, $type)
    {
        $this->_movie_id   = $movie_id;
        $this->_title   = $title;
        $this->_year   = $year;
        $this->_type    = $type;

        if($this->_type === 'movie') {
            $this->getUrl();

            if($this->_trailer_url === null)
                return;

            $this->getMovieTrailer();

            if(!$this->_trailer)
                $this->getMovieTeaser();
        }
    }

    /**
     * @return mixed
     */
    public function getTrailer()
    {
        if($this->_type !== 'movie')
            return;

        try
        {
            $trailer = $this->getMovieTrailer();

            if(!$trailer)
                $trailer = $this->getMovieTeaser();

            return $trailer;
        } catch (Exception $e) {
            return;
        }
    }

    private function getUrl()
    {
        try {
            $this->_trailer_url = Cache::get($this->_movie_id.'.trailer_url');
            return $this->_trailer_url;
        } catch (CacheNotFoundException $e)
        {
            $html = Request::forge('https://www.themoviedb.org/search/movie?query=' . urlencode($this->_title) . '+y%3A' . $this->_year . '&language=us', 'curl');
            $html->set_header('User-Agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');

            $html->execute();

            if ($html->response()->status !== 200) return false;

            $media = $html->response()->body;

            $regex = '/<a data-id="[a-z0-9]*" data-media-type="movie" data-media-adult="[a-z]*" class="[a-z]*" href="(\/movie\/[\d]*\?language\=us)">/i';

            preg_match($regex, $media, $urls);

            if (!isset($urls[1])) return false;

            $this->_trailer_url = explode('?', $urls[1])[0];

            Cache::set($this->_movie_id . '.trailer_url', $this->_trailer_url, 24 * 60 * 60);
            return $this->_trailer_url;
        }
    }

    private function getMovieTrailer()
    {
        $html = Request::forge('https://www.themoviedb.org' . $this->getUrl() . '/videos?active_nav_item=Trailers&video_language=en-US&language=en-US', 'curl');
        $html->set_header('User-Agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');
        $html->set_options(array(
                CURLOPT_FOLLOWLOCATION => true,
            )
        );
        $html->execute();

        if ($html->response()->status !== 200)
            return false;

        $media = $html->response()->body;

        $regex = '/<a href="https:\/\/www\.youtube\.com\/watch\?v=(.*)" target="_blank" rel="noopener">.*<\/a>/';

        preg_match($regex, $media, $youtube);

        if (!isset($youtube[1]))
            return false;

        $youtube = '//www.youtube.com/embed/'.$youtube[1].'?enablejsapi=1&autoplay=0&hl=en-US&modestbranding=1&fs=1';

        $this->_trailer = $youtube;

        return $this->_trailer;
    }

    private function getMovieTeaser()
    {
        $html = Request::forge('https://www.themoviedb.org' . $this->getUrl() . '/videos?active_nav_item=Teasers&video_language=en-US&language=en-US', 'curl');
        $html->set_header('User-Agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');
        $html->set_options([CURLOPT_FOLLOWLOCATION => true,]);
        $html->execute();

        if ($html->response()->status !== 200) return false;

        $media = $html->response()->body;

        $regex = '/<iframe type="text\/html" src="(\/\/www.youtube.com\/embed\/[a-zA-Z0-9\_]*\?enablejsapi\=1&autoplay\=0\&origin\=https%3A%2F%2Fwww\.themoviedb\.org\&hl\=en-US\&modestbranding\=1\&fs\=1)" frameborder\="0" allowfullscreen><\/iframe>/';

        preg_match($regex, $media, $youtube);

        if (!isset($youtube[1])) return false;

        $youtube = preg_replace('/\&origin\=https%3A%2F%2Fwww\.themoviedb\.org/i', '', $youtube[1]);

        $this->_trailer = $youtube;

        return $this->_trailer;
    }
}