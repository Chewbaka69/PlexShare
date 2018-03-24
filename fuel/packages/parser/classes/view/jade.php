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

use Everzet\Jade as Everzet;
use Tale\Jade as Tale;

class View_Jade extends \View
{
	protected static $_parser;
	protected static $_cache;

	/**
	 * Returns the Parser lib object
	 *
	 * @return  Everzet\Jade
	 */
	public static function everzet_parser()
	{
		// load a parser object
		if (empty(static::$_parser))
		{
			$parser = new Everzet\Parser(new Everzet\Lexer\Lexer());
			$dumper = new Everzet\Dumper\PHPDumper();
			$dumper->registerVisitor('tag', new Everzet\Visitor\AutotagsVisitor());
			$dumper->registerFilter('javascript', new Everzet\Filter\JavaScriptFilter());
			$dumper->registerFilter('cdata', new Everzet\Filter\CDATAFilter());
			$dumper->registerFilter('php', new Everzet\Filter\PHPFilter());
			$dumper->registerFilter('style', new Everzet\Filter\CSSFilter());

			static::$_parser = new Everzet\Jade($parser, $dumper, static::$_cache);
		}

		return static::$_parser;
	}

	/**
	 * @InheritDoc
	 */
	public $extension = 'jade';

	/**
	 * @InheritDoc
	 */
	protected function process_file($file_override = false)
	{
		// update the cache path
		$this->cache_init($file);

		// determine the filename
		$file = $file_override ?: $this->file_name;

		// render the template using the Everzet implementation
		if (class_exists('Everzet\\Jade\\Jade'))
		{
			// render the template
			$file = static::everzet_parser()->cache($file);
			$result = parent::process_file($file);
		}

		// render the template using the Tale implementation
		elseif (class_exists('Tale\\Jade\\Renderer'))
		{
			// get the config
			$config = \Config::get('parser.View_Jade', array());

			// set our cache path
			$config['cachePath'] = static::$_cache;

			// create a renderer instance
			static::$_jade = new Tale\Renderer($config);

			// render the template
			$result = static::$_jade->render($file, $data = $this->get_data());

			// disable sanitization on objects that support it
			$this->unsanitize($data);
		}

		// no known renderer found
		else
		{
			throw new \FuelException("No supported Jade renderer found. Please check the documentation");
		}

		return $result;
	}

	// Jade stores cached templates as the filename in plain text,
	// so there is a high chance of name collisions (ex: index.jade).
	// This function attempts to create a unique directory for each
	// compiled template.
	protected function cache_init($file_path)
	{
		$cache_key = md5($file_path);
		$cache_path = \Config::get('parser.View_Jade.cache_dir', null)
			.substr($cache_key, 0, 2).DS.substr($cache_key, 2, 2);

		if ($cache_path !== null AND ! is_dir($cache_path))
		{
			mkdir($cache_path, 0777, true);
		}

		static::$_cache = $cache_path;
	}

}
