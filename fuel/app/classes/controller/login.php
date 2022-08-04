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
    public function before()
    {
        parent::before();

        $lock = Config::load('lock', true);

        if(!$lock)
            Response::redirect('/install');

        $user = Session::get('user');

        if($user)
            Response::redirect('/home');
    }

    public function action_index()
    {
        $view = View::forge('login/index');
        $start_js = Asset::js('jquery.min.js');

        $panel = Config::load('panel', true);

        $view->set('registration', (bool)$panel['registration']);

        try {

            if (Input::method() === 'POST') {
                $configdb = Config::load('db', true);
                $configCrypt = Config::load('crypt', true);

                $login = Input::post('email');
                $password = Input::post('password');
                $passwordHash = hash('sha512', $configCrypt['sodium']['cipherkey'] . $password);

                if($user = Model_User::Login($login, $passwordHash)) {
                    $user->lastlogin = time();
                    $user->save();

                    Session::set('user', $user);
                    Response::redirect('/home');
                } else {
                    $view->set('error','Username or password is incorrect.');
                }
            }
        } catch (FuelException $e) {
            $view->set('error', $e->getMessage());
        }

        $view->set_safe('start_js', $start_js);

        return Response::forge($view);
    }
}