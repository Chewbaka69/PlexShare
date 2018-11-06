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

class View_Lex extends \View
{
	protected static $_parser;

	public static function parser()
	{
		if ( ! empty(static::$_parser))
		{
			return static::$_parser;
		}

		static::$_parser = new \Lex\Parser();

		return static::$_parser;
	}

	public static function injectNoparse($template)
	{
		\Lex\Parser::injectNoparse($template);
	}

	public $extension = 'lex';

	protected $callback = false;

	public function setCallback($callback = false)
	{
		$this->callback = $callback;

		return $this;
	}

	protected function process_file($file_override = false)
	{
		$file = $file_override ?: $this->file_name;

		try
		{
			$data = $this->get_data();
			static::parser()->scopeGlue(\Config::get('parser.View_Lex.scope_glue', '.'));
			$result = static::parser()->parse(file_get_contents($file), $data, $this->callback, \Config::get('parser.View_Lex.allow_php', false));
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
}
