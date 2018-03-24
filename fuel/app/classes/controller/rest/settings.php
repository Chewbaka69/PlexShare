<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Rest_Settings extends Controller_Rest
{
    public function get_add_server()
    {
        $view = View::forge('modal/modal');

        return new Response($view);
    }
}