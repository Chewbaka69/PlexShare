<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\FuelException;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Rest_Settings extends Controller_Rest
{
    public function get_modal_server()
    {
        $view = View::forge('modal/modal');

        return $this->response($view->render());
    }

    public function post_server()
    {
        try {
            $server_id = Input::post('server_id');
            $url = Input::post('url');
            $port = Input::post('port');
            $token = Input::post('token');

            //@TODO CHECK AND REMOVE HTTP AND HTTPS

            $curl = Request::forge('http://' . $url . ($port ? ':' . $port : '') . '/?X-Plex-Token=' . $token, 'curl');
            $result = $curl->execute();

            if(!$result)
                throw new FuelException('Can not connect to your server!');

            $server = $server_id === null ? Model_Server::forge() : Model_Server::find_by_pk($server_id);
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
            return $this->response(array('error' => true, 'message' => $e->getMessage() ?: 'Wrong parameters'), $e->getCode());
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

    public function delete_library()
    {
        try {
            $library = Input::delete('library_id');

            $library = Model_Library::find_one_by(function($query) use($library) {
                $query
                    ->join('server', 'LEFT')
                    ->on('server.id', '=','library.server_id' )
                    ->where('server.user_id', Session::get('user')->id)
                    ->and_where('library.id', $library)
                    ->and_where('library.disable', 0)
                    ->and_where('server.disable', 0)
                ;
            });

            if(!$library)
                throw new FuelException('No active library found!');

            $library->set(['disable' => 1]);
            $library->save();

            return $this->response(array('error' => false));
        } catch (FuelException $e) {
            return $this->response(array('error' => true, 'message' => $e->getMessage() ?: 'Wrong parameters'), 400);
        }
    }
}