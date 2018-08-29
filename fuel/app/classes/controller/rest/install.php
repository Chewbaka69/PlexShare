<?php

use Fuel\Core\Config;
use Fuel\Core\Controller_Rest;
use Fuel\Core\DB;
use Fuel\Core\DBUtil;
use Fuel\Core\FuelException;
use Fuel\Core\Input;
use Fuel\Core\Request;
use Fuel\Core\Str;

class Controller_Rest_Install extends Controller_Rest
{
    public function post_require()
    {
        $result = [];

        $version = version_compare(PHP_VERSION, 5.6, '>=');
        $result['version'] = $version ? true : false;

        $result['mysql'] = extension_loaded('mysql') ? true : false;
        $result['mysqli'] = extension_loaded('mysqli') ? true : false;
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

        $logs = '';

        try {
            DB::start_transaction();

            $logs .= 'Creation table user'."\r\n";
            /**
             * CREATE TABLE USER
             */
            DBUtil::create_table(
                'user',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'username' => array('constraint' => 255, 'type' => 'varchar'),
                    'email' => array('constraint' => 255, 'type' => 'varchar'),
                    'password' => array('constraint' => 255, 'type' => 'varchar'),
                    'admin' => array('constraint' => 1, 'type' => 'int', 'default' => 0),
                    'lastlogin' => array('constraint' => 11, 'type' => 'int'),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );

            $logs .= 'Table user create!'."\r\n";

            $logs .= 'Creation table server'."\r\n";
            /**
             * CREATE TABLE SERVER
             */
            DBUtil::create_table(
                'server',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'user_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'url' => array('constraint' => 255, 'type' => 'varchar'),
                    'port' => array('constraint' => 2, 'type' => 'int', 'null' => true),
                    'token' => array('constraint' => 255, 'type' => 'varchar'),
                    'lastcheck' => array('constraint' => 11, 'type' => 'int'),
                    'name' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'plateforme' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'platformVersion' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'updatedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'version' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'online' => array('constraint' => 1, 'type' => 'int', 'default' => 0),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Server table create!'."\r\n";

            $logs .= 'Creation table library'."\r\n";
            /**
             * CREATE TABLE LIBRARY
             */
            DBUtil::create_table(
                'library',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'server_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'plex_key' => array('constraint' => 11, 'type' => 'int'),
                    'name' => array('constraint' => 255, 'type' => 'varchar'),
                    'type' => array('constraint' => 255, 'type' => 'varchar'),
                    'updatedAt' => array('constraint' => 11, 'type' => 'int'),
                    'createdAt' => array('constraint' => 11, 'type' => 'int'),
                    'scannedAt' => array('constraint' => 11, 'type' => 'int'),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Library table create!'."\r\n";

            $logs .= 'Creation table tv_show'."\r\n";
            /**
             * CREATE TABLE LIBRARY
             */
            DBUtil::create_table(
                'tvshow',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'library_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'plex_key' => array('constraint' => 255, 'type' => 'varchar'),
                    'studio' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'title' => array('constraint' => 255, 'type' => 'varchar'),
                    'contentRating' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'summary' => array('type' => 'text', 'null' => true),
                    'rating' => array('constraint' => 3, 'type' => 'varchar', 'null' => true),
                    'year' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'thumb' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'art' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'banner' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'theme' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'originallyAvailableAt' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'leafCount' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'addedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'updatedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Library table create!'."\r\n";

            $logs .= 'Creation table season'."\r\n";
            /**
             * CREATE TABLE SEASON
             */
            DBUtil::create_table(
                'season',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'tv_show_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'plex_key' => array('constraint' => 36, 'type' => 'varchar'),
                    'number' => array('constraint' => 11, 'type' => 'int'),
                    'title' => array('constraint' => 255, 'type' => 'varchar'),
                    'thumb' => array('constraint' => 255, 'type' => 'varchar'),
                    'art' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'leafCount' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'addedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'updatedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Season table create!'."\r\n";

            $logs .= 'Creation table movie'."\r\n";
            /**
             * CREATE TABLE SEASON
             */
            DBUtil::create_table(
                'movie',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'library_id' => array('constraint' => 36, 'type' => 'varchar', 'null' => true),
                    'season_id' => array('constraint' => 36, 'type' => 'varchar', 'null' => true),
                    'plex_key' => array('constraint' => 36, 'type' => 'varchar'),
                    'type' => array('constraint' => 5, 'type' => 'varchar'),
                    'number' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'studio' => array('constraint' => 36, 'type' => 'varchar', 'null' => true),
                    'title' => array('constraint' => 255, 'type' => 'varchar'),
                    'originalTitle' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'summary' => array('type' => 'text', 'null' => true),
                    'rating' => array('constraint' => 3, 'type' => 'varchar', 'null' => true),
                    'year' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'thumb' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'art' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                    'duration' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'originallyAvailableAt' => array('constraint' => 11, 'type' => 'varchar', 'null' => true),
                    'addedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'updatedAt' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Movie table create!'."\r\n";

            $logs .= 'Creation table configuration'."\r\n";
            /**
             * CREATE TABLE CONFIGURATION
             */
            DBUtil::create_table(
                'configurations',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'name' => array('constraint' => 255, 'type' => 'varchar'),
                    'data' => array('constraint' => 255, 'type' => 'varchar')
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Configuration table create!'."\r\n";

            $logs .= 'Creation table permission'."\r\n";
            /**
             * CREATE TABLE PERMISSION
             */
            DBUtil::create_table(
                'permission',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'name' => array('constraint' => 255, 'type' => 'varchar'),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Permission table create!'."\r\n";

            $logs .= 'Creation table libraries permission'."\r\n";
            /**
             * CREATE TABLE USER'S PERMISSION
             */
            DBUtil::create_table(
                'libraries_permission',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'permission_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'library_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'value' => array('constraint' => 36, 'type' => 'varchar'),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'Libraries Permission table create!'."\r\n";

            $logs .= 'Creation table user permission'."\r\n";
            /**
             * CREATE TABLE USER'S PERMISSION
             */
            DBUtil::create_table(
                'user_permission',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'permission_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'user_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'library_id' => array('constraint' => 36, 'type' => 'varchar', 'null' => true),
                    'value' => array('constraint' => 36, 'type' => 'varchar'),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'User Permission table create!'."\r\n";

            $logs .= 'Creation table user watching'."\r\n";
            /**
             * CREATE TABLE USER'S WATCHING
             */
            DBUtil::create_table(
                'user_watching',
                array(
                    'id' => array('constraint' => 36, 'type' => 'varchar'),
                    'file_id' => array('constraint' => 11, 'type' => 'int'),
                    'user_id' => array('constraint' => 36, 'type' => 'varchar'),
                    'disable' => array('constraint' => 1, 'type' => 'int', 'default' => 0)
                ),
                array('id'), false, 'InnoDB', 'utf8_unicode_ci'
            );
            $logs .= 'User Watching table create!'."\r\n";

            $logs .= 'Create Foreign key'."\r\n";
            /**
             * FOREIGN KEY
             */
            DBUtil::add_foreign_key('tvshow', array(
                'constraint' => 'constraintTvShowLibrary',
                'key' => 'library_id',
                'reference' => array(
                    'table' => 'library',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('season', array(
                'constraint' => 'constraintSeasonTvShow',
                'key' => 'tv_show_id',
                'reference' => array(
                    'table' => 'tvshow',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('movie', array(
                'constraint' => 'constraintMovieLibrary',
                'key' => 'library_id',
                'reference' => array(
                    'table' => 'library',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('movie', array(
                'constraint' => 'constraintMovieSeason',
                'key' => 'season_id',
                'reference' => array(
                    'table' => 'season',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('libraries_permission', array(
                'constraint' => 'constraintPermissionLibrariesPermission',
                'key' => 'permission_id',
                'reference' => array(
                    'table' => 'permission',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('libraries_permission', array(
                'constraint' => 'constraintLibraryLibrariesPermission',
                'key' => 'library_id',
                'reference' => array(
                    'table' => 'permission',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('user_permission', array(
                'constraint' => 'constraintPermissionUserPermission',
                'key' => 'permission_id',
                'reference' => array(
                    'table' => 'permission',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('user_permission', array(
                'constraint' => 'constraintUserUserPermission',
                'key' => 'user_id',
                'reference' => array(
                    'table' => 'user',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('user_permission', array(
                'constraint' => 'constraintLibraryUserPermission',
                'key' => 'library_id',
                'reference' => array(
                    'table' => 'library',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('user_watching', array(
                'constraint' => 'constraintUserWatching',
                'key' => 'user_id',
                'reference' => array(
                    'table' => 'user',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('library', array(
                'constraint' => 'constraintServerLibrary',
                'key' => 'server_id',
                'reference' => array(
                    'table' => 'server',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));
            DBUtil::add_foreign_key('server', array(
                'constraint' => 'constraintServerUser',
                'key' => 'user_id',
                'reference' => array(
                    'table' => 'user',
                    'column' => 'id',
                ),
                'on_update' => 'NO ACTION',
                'on_delete' => 'NO ACTION',
            ));

            $logs .= 'Foreign key create!'."\r\n";

            DB::commit_transaction();

            $logs .= 'All Tables and Foreign Key successfully!'."\r\n";

            return $this->response(array('error' => false, 'message' => $logs));
        }catch (FuelException $e) {
            DBUtil::drop_table('user_watching');
            DBUtil::drop_table('user_permission');
            DBUtil::drop_table('libraries_permission');
            DBUtil::drop_table('permission');
            DBUtil::drop_table('library');
            DBUtil::drop_table('server');
            DBUtil::drop_table('configurations');
            DBUtil::drop_table('user');
            DB::rollback_transaction();
            return $this->response(array('error' => true, 'message' => $e->getMessage()), 400);
        }
    }

    public function post_admin()
    {
        try {
            $config = Config::load('db', true);

            $email = Input::post('email');
            $username = Input::post('username');
            $password = Input::post('password');
            $Cpassword = Input::post('cpassword');

            if($password !== $Cpassword)
                throw new FuelException('Password match error!');

            $user = Model_User::forge(array(
                'username'  => $username,
                'email'     => $email,
                'password'  => hash('sha512', $config['default']['hash'] . $password),
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

            //@TODO CHECK AND REMOVE HTTP AND HTTPS

            $port = Input::post('port');
            $token = Input::post('token');

            $curl = Request::forge('http://' . $url . ($port ? ':' . $port : '') . '/?X-Plex-Token=' . $token, 'curl');
            $result = $curl->execute();

            if(!$result)
                throw new FuelException('Can not connect to your server!');

            $server = Model_Server::forge();
            $server->set([
                'url'       => $url,
                'port'      => $port,
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