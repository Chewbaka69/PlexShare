<?php

use Fuel\Core\DB;
use Fuel\Core\Request;
use Fuel\Core\Format;

class Model_Server extends Model_Overwrite
{
    protected static $_table_name = 'server';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'user_id',
        'https',
        'url',
        'port',
        'token',
        'lastcheck',
        'name',
        'plateforme',
        'platformVersion',
        'updatedAt',
        'version',
        'online',
        'disable'
    );

    public function getLastCheck()
    {
        $dateString = date('Y/m/d H:i:s', time());
        $now = new DateTime($dateString);

        $dateString = date('Y-m-d H:i:s', $this->lastcheck);
        $time = new DateTime($dateString);

        $diff = date_diff($now, $time);

        $days = $diff->days . 'd ';
        $hours = $diff->h . 'h ';
        $minutes = $diff->i . 'min ';
        $seconds = $diff->s . 's';

        return $days.$hours.$minutes.$seconds;
    }

    //$curl = Request::forge('http://' . $config['main']['server'] . ':' . $config['main']['port'] . '/:/prefs?X-Plex-Token=' . $config['main']['token'], 'curl');

    /**
     * Browse the list of server registered
     * @param null $_servers
     * @throws Exception
     * @throws HttpNotFoundException
     * @throws \FuelException
     */
    public static function BrowseServeur($_servers = null)
    {
        $servers = $_servers ?: Model_Server::find_all();

        foreach ($servers as $server) {

            try{
                if($server->disable)
                    continue;

                $curl = Request::forge(($server->https ? 'https' : 'http').'://' . $server->url . ($server->port? ':' . $server->port : '') . '/?X-Plex-Token=' . $server->token, 'curl');

                if($server->https) {
                    $curl->set_options([
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => false
                    ]);
                }

                $curl->execute();

                $dataServer = Format::forge($curl->response()->body, 'xml')->to_array();

                if (!isset($dataServer['@attributes'])) {
                    $server->set(['online' => 0]);
                    $server->save();
                }

                $dataServer = $dataServer['@attributes'];

                $server->set(['lastcheck' => time()]);

                ($server->name              !== $dataServer['friendlyName'])     ? $server->set(['name'              => $dataServer['friendlyName']])      : null;
                ($server->plateforme        !== $dataServer['platform'])         ? $server->set(['plateforme'        => $dataServer['platform']])          : null;
                ($server->platformVersion   !== $dataServer['platformVersion'])  ? $server->set(['platformVersion'   => $dataServer['platformVersion']])   : null;
                ($server->updatedAt         !== $dataServer['updatedAt'])        ? $server->set(['updatedAt'         => $dataServer['updatedAt']])         : null;
                ($server->version           !== $dataServer['version'])          ? $server->set(['version'           => $dataServer['version']])           : null;

                $server->set(['online' => 1]);

                $server->save();
            }catch (Exception $exception) {
                $server->set(['online' => 0]);
                $server->save();
                throw new FuelException($exception->getMessage(),$exception->getCode());
            }
        }
    }

    public function getLibraries()
    {
        $id = $this->id;

        $libraries =  Model_Library::find(function ($query) use ($id)
        {
            return $query
                    ->where('server_id', $id)
                    ->order_by('createdAt', 'ASC')
                ;
        });

        return $libraries;
    }
}