<?php



class Model_User_History extends Model_Overwrite
{
    protected static $_table_name = 'user_history';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'user_id',
        'movie_id',
        'watching_time',
        'ended_time',
        'is_ended',
        'date'
    );

    private $_movie = null;

    public function getMovie()
    {
        if(!$this->_movie && $this->movie_id !== null)
            $this->_movie = Model_Movie::find_by_pk($this->movie_id);

        return $this->_movie;
    }
}
