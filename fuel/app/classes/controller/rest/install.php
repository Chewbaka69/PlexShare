<?php

use Fuel\Core\Config;
use Fuel\Core\Controller_Rest;
use Fuel\Core\DBUtil;
use Fuel\Core\FuelException;
use Fuel\Core\Input;
use Fuel\Core\Migrate;
use Fuel\Core\Request;
use Fuel\Core\Response;
use Fuel\Core\Str;

class Controller_Rest_Install extends Controller_Rest
{
    public function before()
    {
        parent::before();

        $lock = Config::load('lock', true);

        if($lock)
            Response::redirect('/login');
    }

    public function post_require()
    {
        $result = [];

        $version = version_compare(PHP_VERSION, 5.6, '>=');
        $result['version'] = $version ? true : false;

        $result['mysql'] = extension_loaded('mysql') || extension_loaded('mysqli') ? true : false;
        $result['pdo_mysql'] = extension_loaded('pdo_mysql') ? true : false;
        $result['simplexml'] = extension_loaded('SimpleXML') ? true : false;
        $result['curl'] = function_exists('curl_version') ? true : false;
        $result['config'] = is_writable('../fuel/app/config/') ? true : false;

        return $this->response($result);
    }

    public function post_config()
    {
        try {
            $host = Input::post('host');
            $port = Input::post('port');
            $dbname = Input::post('database');
            $username = Input::post('username');
            $password = Input::post('password');

            $boolean = Config::load('db', true);

            if(!$boolean)
                throw new FuelException('Config db.php not work!');

            $config = array(
                'active' => 'default',
                'default' => array(
                    'type' => 'pdo',
                    'connection'     => array(
                        'dsn'            => 'mysql:host=' . $host . ($port ? ';port=' . $port : '') . ';dbname=' . $dbname,
                        'hostname'       => $host,
                        'port'           => $port,
                        'database'       => $dbname,
                        'username'       => $username,
                        'password'       => $password,
                    ),
                    'table_prefix'   => 'plex_',
                    'charset'        => 'utf8',
                    'enable_cache'   => true,
                    'hash'           => Str::random('alnum', 32)
                ),
            );

            Config::save('db', $config);

            return $this->response(array('error' => false));
        }catch (FuelException $e) {
            return $this->response(array('error' => true, 'message' => $e->getMessage()), 400);
        }
    }

    public function post_tables()
    {

        Config::load('db', true);

        try {
            $migration = Migrate::current();

            $logs = 'All Tables and Foreign Key are successfully install!'."\r\n";

            return $this->response(['error' => false, 'message' => $logs]);
        } catch (FuelException $e) {
            try {
                DBUtil::drop_table('user_history');
                DBUtil::drop_table('user_permission');
                DBUtil::drop_table('user_settings');
                DBUtil::drop_table('library_permission');
                DBUtil::drop_table('movie');
                DBUtil::drop_table('season');
                DBUtil::drop_table('tvshow');
                DBUtil::drop_table('library');
                DBUtil::drop_table('server');
                DBUtil::drop_table('configurations');
                DBUtil::drop_table('user');
                DBUtil::drop_table('permission');
                DBUtil::drop_table('library');
                
                return $this->response(array('error' => true, 'message' => $e->getMessage()), 400);
            } catch (FuelException $e) {
                return $this->response(array('error' => true, 'message' => $e->getMessage()), 400);
            }
        }
    }

    public function post_admin()
    {
        try {
            $configCrypt = Config::load('crypt', true);

            $email = Input::post('email');
            $username = Input::post('username');
            $password = Input::post('password');
            $Cpassword = Input::post('cpassword');

            if($password !== $Cpassword)
                throw new FuelException('Password match error!');

            $user = Model_User::forge(array(
                'username'  => $username,
                'email'     => $email,
                'password'  => hash('sha512', $configCrypt['sodium']['cipherkey'] . $password),
                'admin'     => 1,
                'lastlogin' => time()
            ));

            if(!$user->validates()) {
                throw new FuelException($user->validation()->show_errors());
            }

            $user->save();

            return $this->response(array('error' => false));
        } catch (Exception $e) {
            return $this->response(array('error' => true, 'message' => $e->getMessage()), 404);
        }
    }

    public function post_plex()
    {
        try {
            $url = Input::post('url');
            $https = Input::post('https');
            $port = Input::post('port');
            $token = Input::post('token');

            $curl = Request::forge(($https === '1' ? 'https' : 'http') . '://' . $url . ($port ? ':' . $port : '') . '/?X-Plex-Token=' . $token, 'curl');
            $result = $curl->execute();

            if(!$result)
                throw new FuelException('Can not connect to your server!');

	    $user = Model_User::find_one_by('admin', 1);

            $server = Model_Server::forge();
            $server->set([
                'user_id'   => $user->id,
                'https'     => (int)$https,
                'url'       => $url,
                'port'      => (int)$port,
                'token'     => $token,
                'lastcheck' => time()
            ]);
            $server->save();

            Config::save('lock', array('FUCK OFF!'));

            return $this->response(array('error' => false));
        } catch (FuelException $e) {
            return $this->response(array('error' => true, 'message' => $e->getMessage()), 400);
        }
    }
}
