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

namespace Parser;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class View_Mustache extends \View
{
	protected static $_parser;

	protected function process_file($file_override = false)
	{
		$file = $file_override ?: $this->file_name;
		$data = $this->get_data();

		try
		{
			$result = static::parser()->render(file_get_contents($file), $data);
		}
		catch (\Exception $e)
		{
			// Delete the output buffer & re-throw the exception
			ob_end_clean();
			throw $e;
		}

		$this->unsanitize($data);
		return $result;
	}

	public $extension = 'mustache';

	/**
	 * Returns the Parser lib object
	 *
	 * @return  Mustache_Engine
	 */
	public static function parser()
	{
		if ( ! empty(static::$_parser))
		{
			return static::$_parser;
		}

		$options = array(
			// TODO: set 'logger' with Monolog instance.
			'cache'   => \Config::get('parser.View_Mustache.environment.cache_dir', APPPATH.'cache'.DS.'mustache'.DS),
			'charset' => \Config::get('parser.View_Mustache.environment.charset', 'UTF-8'),
		);

		if ($partials = \Config::get('parser.View_Mustache.environment.partials', array()))
		{
			$options['partials'] = $partials;
		}

		if ($helpers = \Config::get('parser.View_Mustache.environment.helpers', array()))
		{
			$options['helpers'] = $helpers;
		}

		if ($partials = \Config::get('parser.View_Mustache.environment.partials_loader', 'UTF-8'))
		{
			$options['partials_loader'] = new Mustache_Loader_FilesystemLoader($partials);
		}

		static::$_parser = new Mustache_Engine($options);

		return static::$_parser;
	}
}

// end of file mustache.php
