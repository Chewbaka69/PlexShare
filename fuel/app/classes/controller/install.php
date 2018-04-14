<?php

use Fuel\Core\Controller;
use Fuel\Core\FuelException;
use Fuel\Core\Response;
use Fuel\Core\View;
use Fuel\Core\Asset;

class Controller_Install extends Controller
{
    public function action_index()
    {
        $lock = Config::load('lock', true);

        if($lock)
            Response::redirect('/login');

        $view = View::forge('install/index');

        $js = Asset::js('plex_alert.js');

        $view->set_safe('end_js', $js);

        $config_db = Config::load('db', true);
        $config_db = $config_db['default'];

        $view->set('db_host', $config_db['connection']['hostname']);
        $view->set('db_port', $config_db['connection']['port']);
        $view->set('db_database', $config_db['connection']['database']);
        $view->set('db_prefix', $config_db['table_prefix']);
        $view->set('db_username', $config_db['connection']['username']);
        $view->set('db_password', $config_db['connection']['password']);

        try {
            $config_plex = Model_Server::find()[0];

            if($config_plex) {
                $view->set('plex_url', $config_plex->url);
                $view->set('plex_port', $config_plex->port);
                $view->set('plex_token', $config_plex->token);
            }
        }catch (FuelException $e){
            //@TODO
        }

        return $view;
    }
}