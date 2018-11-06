<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.1
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2018 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Auth\Model;

class Auth_Userpermission extends \Orm\Model
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
	 * @var  array  name or names of the primary keys
	 */
	protected static $_primary_key = array('id');

	/**
	 * @var array	model properties
	 */
	protected static $_properties = array(
		'id'              => array(),
		'user_id'         => array(),
		'perms_id'        => array(),
		'actions'         => array(
			'data_type'   => 'serialize',
			'default'     => array(),
			'null'        => false,
			'form'        => array('type' => false),
		),
	);

	/**
	 * @var array	defined observers
	 */
	protected static $_observers = array(
		'Orm\\Observer_Typing' => array(
			'events' => array('after_load', 'before_save', 'after_save'),
		),
	);

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model\\Auth_User',
			'key_to' => 'id',
		),
		'permission' => array(
			'key_from' => 'perms_id',
			'model_to' => 'Model\\Auth_Permission',
			'key_to' => 'id',
		),
	);

	/**
	 * init the class
	 */
   	public static function _init()
	{
		// auth config
		\Config::load('ormauth', true);

		// set the connection this model should use
		static::$_connection = \Config::get('ormauth.db_connection');

		// set the write connection this model should use
		static::$_write_connection = \Config::get('ormauth.db_write_connection') ?: static::$_connection;

		// set the models table name
		static::$_table_name = \Config::get('ormauth.table_name', 'users').'_user_permissions';
	}
}
