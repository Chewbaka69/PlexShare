<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Orm;

class RelationNotSoft extends \Exception
{
}

/**
 * Defines a model that can be "soft" deleted. A timestamp is used to indicate
 * that the data has been deleted but the data itself is not removed from the
 * database.
 *
 * @package Orm
 * @author  Fuel Development Team
 */
class Model_Soft extends Model
{
	/**
	 * Default column name that contains the deleted timestamp
	 * @var string
	 */
	protected static $_default_field_name = 'deleted_at';

	/**
	 * Default value for if a mysql timestamp should be used.
	 * @var boolean
	 */
	protected static $_default_mysql_timestamp = false;

	/**
	 * Contains cached soft delete properties.
	 * @var array
	 */
	protected static $_soft_delete_cached = array();

	protected static $_disable_filter = array();

	protected $_disable_soft_delete = false;

	/**
	 * Gets the soft delete properties.
	 * Mostly stolen from the parent class properties() function
	 *
	 * @return array
	 */
	public static function soft_delete_properties()
	{
		$class = get_called_class();

		// If already determined
		if (array_key_exists($class, static::$_soft_delete_cached))
		{
			return static::$_soft_delete_cached[$class];
		}

		$properties = array();

		// Try to grab the properties from the class...
		if (property_exists($class, '_soft_delete'))
		{
			//Load up the info
			$properties = static::$_soft_delete;
		}

		// cache the properties for next usage
		static::$_soft_delete_cached[$class] = $properties;

		return static::$_soft_delete_cached[$class];
	}

	/**
	 * Disables filtering of deleted entries.
	 */
	public static function disable_filter()
	{
		$class = get_called_class();
		static::$_disable_filter[$class] = false;
	}

	/**
	 * Enables filtering of deleted entries.
	 */
	public static function enable_filter()
	{
		$class = get_called_class();
		static::$_disable_filter[$class] = true;
	}

	/**
	 * @return boolean True if the deleted items are to be filtered out.
	 */
	public static function get_filter_status()
	{
		$class = get_called_class();
		return \Arr::get(static::$_disable_filter, $class, true);
	}

	/**
	 * Fetches a soft delete property description array, or specific data from it.
	 * Stolen from parent class.
	 *
	 * @param  $key      string  property or property.key
	 * @param  $default  mixed   return value when key not present
	 *
	 * @return mixed
	 */
	public static function soft_delete_property($key, $default = null)
	{
		$class = get_called_class();

		// If already determined
		if (! array_key_exists($class, static::$_soft_delete_cached))
		{
			static::soft_delete_properties();
		}

		return \Arr::get(static::$_soft_delete_cached[$class], $key, $default);
	}

	/**
	 * Do some php magic to allow static::find_deleted() to work
	 *
	 * @param  string $method
	 * @param  array  $args
	 * @return mixed
	 */
	public static function __callStatic($method, $args)
	{
		if (strpos($method, 'find_deleted') === 0)
		{
			$temp_args = $args;

			$find_type = count($temp_args) > 0 ? array_shift($temp_args) : 'all';
			$options = count($temp_args) > 0 ? array_shift($temp_args) : array();

			return static::deleted($find_type, $options);
		}

		return parent::__callStatic($method, $args);
	}

	protected function delete_self()
	{
		// If soft deleting has been disabled then just call the parent's delete
		if ($this->_disable_soft_delete)
		{
			return parent::delete_self();
		}

		$deleted_column = static::soft_delete_property('deleted_field', static::$_default_field_name);
		$mysql_timestamp = static::soft_delete_property('mysql_timestamp', static::$_default_mysql_timestamp);

		// Generate the correct timestamp and save it
		$this->{$deleted_column} = $mysql_timestamp ? \Date::forge()->format('mysql') : \Date::forge()->get_timestamp();
		$result = $this->save(false);

		return $result;
	}

	/**
	 * Permanently deletes records using the parent Model delete function
	 *
	 * @param $cascade         boolean
	 * @param $use_transaction boolean
	 *
	 * @return boolean
	 */
	public function purge($cascade = null, $use_transaction = false)
	{

		$this->_disable_soft_delete = true;
		$result = parent::delete($cascade, $use_transaction);
		$this->_disable_soft_delete = false;

		return $result;
	}

	/**
	 * Returns true unless the related model is not soft or temporal
	 */
	protected function should_cascade_delete($rel)
	{
		// Because temporal includes soft delete functionality it can be deleted too
		if ( ! is_subclass_of($rel->model_to, 'Orm\Model_Soft') && ! is_subclass_of($rel->model_to, 'Orm\Model_Temporal'))
		{
			// Throw if other is not soft
			throw new RelationNotSoft('Both sides of the relation must be subclasses of Model_Soft or Model_Temporal if cascade delete is true. '.$rel->model_to.' was found instead.');
		}

		return true;
	}

	/**
	 * Allows a soft deleted entry to be restored.
	 */
	public function restore($cascade_restore = null)
	{
		$deleted_column = static::soft_delete_property('deleted_field', static::$_default_field_name);
		$this->{$deleted_column} = null;

		//Loop through all relations and delete if we are cascading.
		$this->freeze();
		foreach ($this->relations() as $rel_name => $rel)
		{
			//get the cascade delete status
			$rel_cascade = is_null($cascade_restore) ? $rel->cascade_delete : (bool) $cascade_restore;

			//Make sure that the other model is soft delete too
			if ($rel_cascade)
			{
				if (! is_subclass_of($rel->model_to, 'Orm\Model_Soft'))
				{
					//Throw if other is not soft
					throw new RelationNotSoft('Both sides of the relation must be subclasses of Model_Soft if cascade delete is true');
				}

				if (get_class($rel) != 'Orm\ManyMany')
				{
					$model_to = $rel->model_to;
					$model_to::disable_filter();

					//Loop through and call restore on all the models
					foreach ($rel->get($this) as $model)
					{
						$model->restore($cascade_restore);
					}

					$model_to::enable_filter();
				}
			}
		}
		$this->unfreeze();

		return $this->save();
	}

	/**
	 * Alias of restore()
	 */
	public function undelete()
	{
		return $this->restore();
	}

	/**
	 * Overrides the query method to allow soft delete items to be filtered out.
	 */
	public static function query($options = array())
	{
		$query = Query_Soft::forge(get_called_class(), static::connection(), $options);

		if (static::get_filter_status())
		{
			//Make sure we are filtering out soft deleted items
			$query->set_soft_filter(static::soft_delete_property('deleted_field', static::$_default_field_name));
		}

		return $query;
	}

	/**
	 * Alisas of find() but selects only deleted entries rather than non-deleted
	 * ones.
	 */
	public static function deleted($id = null, array $options = array())
	{
		//Make sure we are not filtering out soft deleted items
		$deleted_column = static::soft_delete_property('deleted_field', static::$_default_field_name);
		$options['where'][] = array($deleted_column, 'IS NOT', null);

		static::disable_filter();
		$result = parent::find($id, $options);
		static::enable_filter();

		return $result;
	}

}
