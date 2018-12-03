<?php

use Fuel\Core\Controller;
use Fuel\Core\FuelException;
use Fuel\Core\Response;
use Fuel\Core\View;
use Fuel\Core\Asset;

class Controller_Install extends Controller
{
    public function before()
    {
        parent::before();

        $lock = Config::load('lock', true);

        if($lock)
            Response::redirect('/login');
    }

    public function action_index()
    {
        $view = View::forge('install/index');

        $js = Asset::js('plex_alert.js');

        $view->set_safe('end_js', $js);

        $config_db = Config::load('db', true);
        $config_db = $config_db['default'];

        $view->set('db_host', isset($config_db['connection']['hostname']) ? $config_db['connection']['hostname'] : null);
        $view->set('db_port', isset($config_db['connection']['port']) ? $config_db['connection']['port'] : null);
        $view->set('db_database', isset($config_db['connection']['database']) ? $config_db['connection']['database'] : null);
        $view->set('db_prefix', isset($config_db['table_prefix']) ? $config_db['table_prefix'] : null);
        $view->set('db_username', isset($config_db['connection']['username']) ? $config_db['connection']['username'] : null);
        $view->set('db_password', isset($config_db['connection']['password']) ? $config_db['connection']['password'] : null);

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