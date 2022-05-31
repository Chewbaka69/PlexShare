<?php

use Fuel\Core\Controller;
use Fuel\Core\View;
use Fuel\Core\Asset;
use Fuel\Core\Input;
use Fuel\Core\Config;
use Fuel\Core\FuelException;

class Controller_Register extends Controller
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
        $view = View::forge('register/index');
        $start_js = Asset::js('jquery.min.js');
        $end_js = Asset::js(['pwstrength-bootstrap.min.js']);

        try {

            if (Input::method() === 'POST') {

                $email = Input::post('email');
                $username = Input::post('username');
                $password = Input::post('password');
                $c_password = Input::post('confirm_password');

                if(!$email || !$username || !$password || !$c_password)
                    throw new FuelException('Field(s) is/are empty!');

                if (Input::post('password') !== Input::post('confirm_password'))
                    throw new FuelException('Your password are not identical');

                if(Model_User::EmailAlreadyUse(Input::post('email')))
                    throw new FuelException('Email already use!');

                $config = Config::load('db', true);

                $user = Model_User::forge();
                $user->set(array(
                    'username'  => $username,
                    'email'     => $email,
                    'password'  => hash('sha512', $config['default']['hash'] . $password),
                    'admin'     => 0,
                    'lastlogin' => time()
                ));

                $user->save();

                Session::set('user', $user);
                Response::redirect('/home');
            }
        } catch (FuelException $e) {
            $view->set('error', $e->getMessage());
        }

        $view->set_safe('start_js', $start_js);
        $view->set_safe('end_js', $end_js);

        return $view;
    }
}