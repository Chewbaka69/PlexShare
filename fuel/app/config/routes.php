<?php
return array(
	'_root_'  => 'index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

    'home(/:server_id)?'=> 'home/index',
    'movie/list'        => 'movie/list',
    'library/:library_id' => 'library/index',
    'tvshow/:tvshow_id' => 'tvshow/index',
    'season/:season_id' => 'season/index',
    'movie/:movie_id'   => 'movie/index'
);
