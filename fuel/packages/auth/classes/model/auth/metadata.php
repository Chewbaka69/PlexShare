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

class Auth_Metadata extends \Orm\Model
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
		'parent_id'       => array(),
		'key'             => array(),
		'value'           => array(),
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

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model\\Auth_User',
			'key_from' => 'parent_id',
			'key_to'   => 'id',
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
		static::$_table_name = \Config::get('ormauth.table_name', 'users').'_metadata';
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
