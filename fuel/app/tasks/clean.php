<?php

namespace Fuel\Tasks;

use Exception;
use Fuel\Core\Debug;
use Model_Movie;
use Fuel\Core\Request;

class Clean
{
    public function movies()
    {
        $movies = Model_Movie::find_all();

        /** @var Model_Movie $movie */
        foreach ($movies as $movie) {

            $server = $movie->getServer();

            try {
                $curl = Request::forge(($server->https === '1' ? 'https' : 'http').'://' . $server->url . ($server->port ? ':' . $server->port : '') . $movie->plex_key . '?X-Plex-Token=' . $server->token, 'curl');

                $curl->set_options([
                    CURLOPT_CONNECTTIMEOUT => 1
                ]);

                if($server->https === '1') {
                    $curl->set_options([
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => false
                    ]);
                }

                $curl->execute();

                if ($curl->response()->status !== 200)
                    throw new FuelException('No session found!');

            } catch (Exception $exception) {
                $movie->set([
                    'updatedAt' => time(),
                    'disable'   => 1
                ]);

                $movie->save();
            }
        }
    }
}
