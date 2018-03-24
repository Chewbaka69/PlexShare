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

class Auth_Provider extends \Orm\Model
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
		'parent_id'       => array(),
		'provider'        => array(),
		'uid'             => array(),
		'secret'          => array(),
		'access_token'    => array(),
		'expires'         => array(),
		'refresh_token'   => array(),
		'user_id'         => array(),
		'created_at'      => array(),
		'updated_at'      => array(),
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
	);

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'parent_id',
			'model_to' => 'Model\\Auth_User',
			'key_to' => 'id',
		),
		'createdby' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model\\Auth_User',
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
		static::$_table_name = \Config::get('ormauth.table_name', 'users').'_providers';
	}
}
