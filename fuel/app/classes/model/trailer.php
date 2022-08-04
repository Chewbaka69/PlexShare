<?php

    use Fuel\Core\CacheNotFoundException;
    use Fuel\Core\Debug;

class Model_Trailer
{
    private $_id;

    private $_title;

    private $_year;

    private $_type;

    private $_trailer;

    private $_trailer_url;

    public function __construct($id, $title, $year, $type)
    {
        $this->_id   = $id;
        $this->_title   = $title;
        $this->_year   = $year;
        $this->_type    = $type;
    }

    /**
     * @return mixed
     */
    public function getTrailer()
    {
        try {
            throw new CacheNotFoundException('');
            $this->_trailer = Cache::get($this->_id.'.trailer');
            return $this->_trailer;
        } catch (CacheNotFoundException $e)
        {
            $this->getUrl();

            if(!$this->_trailer_url)
                return null;

            $this->_getTrailer();

            if(!$this->_trailer)
                $this->_getTeaser();

            if(!$this->_trailer)
                return null;

            Cache::set($this->_id . '.trailer', $this->_trailer, 24 * 60 * 60);
            return $this->_trailer;
        }
    }

    private function getUrl()
    {
        try {
            $this->_trailer_url = Cache::get($this->_id.'.trailer_url');
            return $this->_trailer_url;
        } catch (CacheNotFoundException $e)
        {
            $type = $this->_type === 'movie' ? 'movie' : 'tv';

            $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
            $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
            $title = str_replace($entities, $replacements, urlencode(htmlspecialchars_decode($this->_title, ENT_QUOTES)));

            $html = Request::forge('https://www.themoviedb.org/search/' . $type . '?query=' . $title . '+y%3A' . $this->_year . '&language=us', 'curl');
            $html->set_header('User-Agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');

            $html->execute();

            if ($html->response()->status !== 200)
                return false;

            $media = $html->response()->body;

            $regex = '/<a data-id="[a-z0-9]+" data-media-type="' . $type . '" data-media-adult="[a-z]+" class="[a-z]*" href="(\/' . $type . '\/[\d]+\?language\=us)">/i';

            preg_match($regex, $media, $urls);

            if (!isset($urls[1]))
                return false;

            $this->_trailer_url = explode('?', $urls[1])[0];

            Cache::set($this->_id . '.trailer_url', $this->_trailer_url, 24 * 60 * 60);

            return true;
        }
    }

    private function _getTrailer()
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

        return true;
    }

    private function _getTeaser()
    {
        $html = Request::forge('https://www.themoviedb.org' . $this->getUrl() . '/videos?active_nav_item=Teasers&video_language=en-US&language=en-US', 'curl');
        $html->set_header('User-Agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');
        $html->set_options([CURLOPT_FOLLOWLOCATION => true,]);
        $html->execute();

        if ($html->response()->status !== 200)
            return false;

        $media = $html->response()->body;

        $regex = '/<iframe type="text\/html" src="(\/\/www.youtube.com\/embed\/[a-zA-Z0-9\_]*\?enablejsapi\=1&autoplay\=0\&origin\=https%3A%2F%2Fwww\.themoviedb\.org\&hl\=en-US\&modestbranding\=1\&fs\=1)" frameborder\="0" allowfullscreen><\/iframe>/';

        preg_match($regex, $media, $youtube);

        if (!isset($youtube[1]))
            return false;

        $youtube = preg_replace('/\&origin\=https%3A%2F%2Fwww\.themoviedb\.org/i', '', $youtube[1]);

        $this->_trailer = $youtube;

        return true;
    }
}