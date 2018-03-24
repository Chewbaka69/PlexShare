<?php

use Fuel\Core\Controller;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;
use Fuel\Core\Asset;
use Fuel\Core\Input;
use Fuel\Core\Config;
use Fuel\Core\FuelException;

class Controller_Login extends Controller
{

    public function action_index()
    {
        $view = View::forge('login/index');
        $start_js = Asset::js('jquery.min.js');
        $end_js = Asset::js(['plex_alert.js']);

        try {
            $config = Config::load('db', true);

            $login = Input::post('email');
            $password = Input::post('password');
            $password = hash('sha512', $config['default']['hash'] . $password);

            if (Input::method() === 'POST') {
                if($user = Model_User::Login($login, $password)) {
                    Session::set('user', $user);
                    Response::redirect('/home');
                }
            }
        } catch (FuelException $e) {
            $view->set('error', $e->getMessage());
        }

        $view->set_safe('start_js', $start_js);
        $view->set_safe('end_js', $end_js);

        return Response::forge($view);
    }
}