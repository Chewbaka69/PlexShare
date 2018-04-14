<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\FuelException;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Rest_Settings extends Controller_Rest
{
    public function get_add_server()
    {
        $view = View::forge('modal/modal');

        return new Response($view);
    }

    public function post_server()
    {
        try {
            $url = Input::post('url');

            //@TODO CHECK AND REMOVE HTTP AND HTTPS

            $port = Input::post('port');
            $token = Input::post('token');

            $curl = Request::forge('http://' . $url . ($port ? ':' . $port : '') . '/?X-Plex-Token=' . $token, 'curl');
            $result = $curl->execute();

            if(!$result)
                throw new FuelException('Can not connect to your server!');

            $server = Model_Server::forge();
            $server->set([
                'user_id'   => Session::get('user')->id,
                'url'       => $url,
                'port'      => $port,
                'token'     => $token,
                'lastcheck' => time()
            ]);
            $server->save();

            return $this->response(array('error' => false));
        } catch (FuelException $e) {
            return $this->response(array('error' => true, 'message' => $e->getMessage() ?: 'Wrong parameters'), 400);
        }
    }

    public function delete_server()
    {
        try {
            $server = Input::delete('server_id');
            $user = Session::get('user');

            $server = Model_Server::find_by_pk($server);

            if(!$server || $server->user_id !== $user->id)
                throw new FuelException('No server found!');

            $server->set(['disable' => 1]);
            $server->save();

            return $this->response(array('error' => false));
        } catch (FuelException $e) {
            return $this->response(array('error' => true, 'message' => $e->getMessage() ?: 'Wrong parameters'), 400);
        }
    }
}