<?php

    use Fuel\Core\Controller_Template;
    use Fuel\Core\Response;
    use Fuel\Core\Session;

    class Controller_Security extends Controller_Template
    {
        public function before()
        {
            parent::before();

            $lock = Config::load('lock', true);

            if(!$lock)
                Response::redirect('/install');

            $user = Session::get('user');
            if(!$user)
                Response::redirect('/login');
        }

        public function action_index()
        {
            // DO NOTHING
        }
    }