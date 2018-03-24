<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Auth\Model;

require_once __DIR__.'/../../../normalizedrivertypes.php';

class Auth_User extends \Orm\Model
{
	/**
	 * @var  string  connection to use
	 */
	protected static $_connection = null;

	/**
	 * @var  string  write connection to use
	 */
    protected static $_write_connection = null;

	/**
	 * @var  string  table name to overwrite assumption
	 */
	protected static $_table_name;

	/**
	 * @var array	model properties
	 */
	protected static $_properties = array(
		'id'              => array(),
		'username'        => array(
			'label'       => 'auth_model_user.name',
			'default'     => 0,
			'null'        => false,
			'validation'  => array('required', 'max_length' => array(255)),
		),
		'email'           => array(
			'label'       => 'auth_model_user.email',
			'default'     => 0,
			'null'        => false,
			'validation'  => array('required', 'valid_email'),
		),
		'group'	          => array(
			'label'       => 'auth_model_user.group_id',
			'default'     => 0,
			'null'        => false,
			'form'        => array('type' => 'select'),
			'validation'  => array('required', 'is_numeric'),
		),
		'group_id'        => array(
			'label'       => 'auth_model_user.group_id',
			'default'     => 0,
			'null'        => false,
			'form'        => array('type' => 'select'),
			'validation'  => array('required', 'is_numeric'),
		),
		'password'        => array(
			'label'       => 'auth_model_user.password',
			'default'     => 0,
			'null'        => false,
			'form'        => array('type' => 'password'),
			'validation'  => array('min_length' => array(8), 'match_field' => array('confirm')),
		),
		'profile_fields'  => array(
			'default'     => array(),
			'data_type'   => 'serialize',
			'form'        => array('type' => false),
		),
		'last_login'      => array(
			'form'        => array('type' => false),
		),
		'previous_login'  => array(
			'form'        => array('type' => false),
		),
		'login_hash'      => array(
			'form'        => array('type' => false),
		),
		'user_id'         => array(
			'default'     => 0,
			'null'        => false,
			'form'        => array('type' => false),
		),
		'created_at'      => array(
			'default'     => 0,
			'null'        => false,
			'form'        => array('type' => false),
		),
		'updated_at'      => array(
			'default'     => 0,
			'null'        => false,
			'form'        => array('type' => false),
		),
	);

	/**
	 * @var array	defined observers
	 */
	protected static $_observers = array(
		'Orm\\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => false,
		),
		'Orm\\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => false,
		),
		'Orm\\Observer_Typing' => array(
			'events' => array('after_load', 'before_save', 'after_save'),
		),
		'Orm\\Observer_Self' => array(
			'events' => array('before_insert', 'before_update'),
			'property' => 'user_id',
		),
	);

    // EAV container for user metadata
    protected static $_eav = array(
        'metadata' => array(
            'attribute' => 'key',
            'value' => 'value',
        ),
    );

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'group' => array(
			'model_to' => 'Model\\Auth_Group',
			'key_from' => 'group_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
		),
	);

	/**
	 * @var array	has_many relationships
	 */
	protected static $_has_many = array(
		'metadata' => array(
			'model_to' => 'Model\\Auth_Metadata',
			'key_from' => 'id',
			'key_to'   => 'parent_id',
			'cascade_delete' => true,
		),
		'userpermission' => array(
			'model_to' => 'Model\\Auth_Userpermission',
			'key_from' => 'id',
			'key_to'   => 'user_id',
			'cascade_delete' => false,
		),
		'providers' => array(
			'model_to' => 'Model\\Auth_Provider',
			'key_from' => 'id',
			'key_to'   => 'parent_id',
			'cascade_delete' => true,
		),
	);

	/**
	 * @var array	many_many relationships
	 */
	protected static $_many_many = array(
		'roles' => array(
			'key_from' => 'id',
			'model_to' => 'Model\\Auth_Role',
			'key_to' => 'id',
			'table_through' => null,
			'key_through_from' => 'user_id',
			'key_through_to' => 'role_id',
		),
		'permissions' => array(
			'key_from' => 'id',
			'model_to' => 'Model\\Auth_Permission',
			'key_to' => 'id',
			'table_through' => null,
			'key_through_from' => 'user_id',
			'key_through_to' => 'perms_id',
		),
	);

	/**
	 * init the class
	 */
   	public static function _init()
	{
		// auth config
		\Config::load('auth', true);

		// get the auth driver in use
		$drivers = normalize_driver_types();

		// modify the model definition based on the driver used
		if (in_array('Simpleauth', $drivers))
		{
			// remove properties not in use
			unset(static::$_properties['group_id']);
			unset(static::$_properties['previous_login']);
			unset(static::$_properties['user_id']);

			// remove relations
			static::$_eav        = array();
			static::$_belongs_to = array();
			static::$_has_many   = array();
			static::$_many_many  = array();

			// remove observers
			unset(static::$_observers['Orm\\Observer_Self']);

			// simpleauth config
			\Config::load('simpleauth', true);

			// set the connection this model should use
			static::$_connection = \Config::get('simpleauth.db_connection');

			// set the write connection this model should use
			static::$_write_connection = \Config::get('simpleauth.db_write_connection') ?: static::$_connection;

			// set the models table name
			static::$_table_name = \Config::get('simpleauth.table_name', 'users');
		}

		elseif (in_array('Ormauth', $drivers))
		{
			// remove properties not in use
			unset(static::$_properties['group']);
			unset(static::$_properties['profile_fields']);

			// ormauth config
			\Config::load('ormauth', true);

			// set the connection this model should use
			static::$_connection = \Config::get('ormauth.db_connection');

			// set the write connection this model should use
			static::$_write_connection = \Config::get('ormauth.db_write_connection') ?: static::$_connection;

			// set the models table name
			static::$_table_name = \Config::get('ormauth.table_name', 'users');

			// set the relations through table names
			static::$_many_many['roles']['table_through'] = \Config::get('ormauth.table_name', 'users').'_user_roles';
			static::$_many_many['permissions']['table_through'] = \Config::get('ormauth.table_name', 'users').'_user_permissions';
		}

		// model language file
		\Lang::load('auth_model_user', true);
	}

	/**
	 * before_insert observer event method
	 */
	public function _event_before_insert()
	{
		// assign the user id that lasted updated this record
		$this->user_id = 0;
		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->user_id = $id[1];
				break;
			}
		}
	}

	/**
	 * before_update observer event method
	 */
	public function _event_before_update()
	{
		$this->_event_before_insert();
	}
}
