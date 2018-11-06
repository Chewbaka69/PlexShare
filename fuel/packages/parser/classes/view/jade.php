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

namespace Parser;

use Everzet\Jade as Everzet;
use Tale\Jade as Tale;

class View_Jade extends \View
{
	/**
	 * @InheritDoc
	 */
	public $extension = 'jade';

	/**
	 * Returns the Parser lib object
	 *
	 * @return  Everzet\Jade
	 */
	protected function everzet_parser($cachepath)
	{
		// create a parser object
		$parser = new Everzet\Parser(new Everzet\Lexer\Lexer());

		// create a dumper object
		$dumper = new Everzet\Dumper\PHPDumper();
		$dumper->registerVisitor('tag', new Everzet\Visitor\AutotagsVisitor());
		$dumper->registerFilter('javascript', new Everzet\Filter\JavaScriptFilter());
		$dumper->registerFilter('cdata', new Everzet\Filter\CDATAFilter());
		$dumper->registerFilter('php', new Everzet\Filter\PHPFilter());
		$dumper->registerFilter('style', new Everzet\Filter\CSSFilter());

		// return the Jade parser
		return new Everzet\Jade($parser, $dumper, $cachepath);
	}

	/**
	 * Returns the Parser lib object
	 *
	 * @return  Tale\Jade
	 */
	protected function tale_parser($cachepath)
	{
		// get the config
		$config = \Config::get('parser.View_Jade', array());

		// add the cache path for this template
		$config['cachePath'] = $cachepath;

		// create a renderer instance
		return new Tale\Renderer($config);
	}

	/**
	 * @InheritDoc
	 */
	protected function process_file($file_override = false)
	{
		// determine the filename
		$file = $file_override ?: $this->file_name;

		// render the template using the Everzet implementation
		if (class_exists('Everzet\\Jade\\Jade'))
		{
			// render the template
			$file = $this->everzet_parser($this->cache_init($file))->cache($file);
			$result = parent::process_file($file);
		}

		// render the template using the Tale implementation
		elseif (class_exists('Tale\\Jade\\Renderer'))
		{
			// render the template
			$result = $this->jade_parser($this->cache_init($file))->render($file, $data = $this->get_data());

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

		return $cache_path;
	}

}
