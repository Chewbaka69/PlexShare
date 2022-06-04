<?php
return array(
	'_root_'                                        => 'index',  // The default route
	'_404_'                                         => 'error/404',    // The main 404 route

    'home(/:server_id)?'                            => 'home/index',
    'library/:library_id'                           => 'library/index',
    'tvshow/:tvshow_id'                             => 'tvshow/index',
    'season/:season_id'                             => 'season/index',
    'episode/:movie_id/download'                    => 'movie/download',
    'episode/:episode_id'                           => 'episode/index',
    'movie/list'                                    => 'movie/list',
    'movie/:movie_id/video/\:/transcode/:transcode/session/:session/:index/:base' => 'movie/stream',
    'movie/:movie_id/download'                      => 'movie/download',
    'movie/:movie_id'                               => 'movie/index',
    'settings/libraries/premissions/:library_id'    => 'settings/libraries/permissions'
);
