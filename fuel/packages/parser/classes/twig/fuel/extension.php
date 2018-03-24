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

use Router;
use Uri;
use Twig_Extension;
use Twig_Function_Function;
use Twig_Function_Method;

/**
 * Provides Twig support for commonly used FuelPHP classes and methods.
 */
class Twig_Fuel_Extension extends Twig_Extension
{
	/**
	 * Gets the name of the extension.
	 *
	 * @return  string
	 */
	public function getName()
	{
		return 'fuel';
	}

	/**
	 * Sets up all of the functions this extension makes available.
	 *
	 * @return  array
	 */
	public function getFunctions()
	{
		return array(
			'fuel_version'      => new Twig_Function_Method($this, 'fuel_version'),
			'url'               => new Twig_Function_Method($this, 'url'),

			'base_url'          => new Twig_Function_Function('Uri::base'),
			'current_url'       => new Twig_Function_Function('Uri::current'),
			'uri_segment'       => new Twig_Function_Function('Uri::segment'),
			'uri_segments'      => new Twig_Function_Function('Uri::segments'),

			'config'            => new Twig_Function_Function('Config::get'),

			'dump'              => new Twig_Function_Function('Debug::dump'),

			'lang'              => new Twig_Function_Function('Lang::get'),

			'form_open'         => new Twig_Function_Function('Form::open'),
			'form_close'        => new Twig_Function_Function('Form::close'),
			'form_input'        => new Twig_Function_Function('Form::input'),
			'form_password'     => new Twig_Function_Function('Form::password'),
			'form_hidden'       => new Twig_Function_Function('Form::hidden'),
			'form_radio'        => new Twig_Function_Function('Form::radio'),
			'form_checkbox'     => new Twig_Function_Function('Form::checkbox'),
			'form_textarea'     => new Twig_Function_Function('Form::textarea'),
			'form_file'         => new Twig_Function_Function('Form::file'),
			'form_button'       => new Twig_Function_Function('Form::button'),
			'form_reset'        => new Twig_Function_Function('Form::reset'),
			'form_submit'       => new Twig_Function_Function('Form::submit'),
			'form_select'       => new Twig_Function_Function('Form::select'),
			'form_label'        => new Twig_Function_Function('Form::label'),

			'form_val'          => new Twig_Function_Function('Input::param'),
			'input_get'         => new Twig_Function_Function('Input::get'),
			'input_post'        => new Twig_Function_Function('Input::post'),

			'asset_add_path'    => new Twig_Function_Function('Asset::add_path'),
			'asset_css'         => new Twig_Function_Function('Asset::css'),
			'asset_js'          => new Twig_Function_Function('Asset::js'),
			'asset_img'         => new Twig_Function_Function('Asset::img'),
			'asset_render'      => new Twig_Function_Function('Asset::render'),
			'asset_find_file'   => new Twig_Function_Function('Asset::find_file'),

			'theme_asset_css'   => new Twig_Function_Method($this, 'theme_asset_css'),
			'theme_asset_js'    => new Twig_Function_Method($this, 'theme_asset_js'),
			'theme_asset_img'   => new Twig_Function_Method($this, 'theme_asset_img'),

			'html_anchor'       => new Twig_Function_Function('Html::anchor'),
			'html_mail_to_safe' => new Twig_Function_Function('Html::mail_to_safe'),

			'session_get'       => new Twig_Function_Function('Session::get'),
			'session_get_flash' => new Twig_Function_Function('Session::get_flash'),

			'markdown_parse'    => new Twig_Function_Function('Markdown::parse'),

			'auth_has_access'   => new Twig_Function_Function('Auth::has_access'),
			'auth_check'        => new Twig_Function_Function('Auth::check'),
			'auth_get'          => new Twig_Function_Function('Auth::get'),
		);
	}

	/**
	 * Provides the url() functionality.  Generates a full url (including
	 * domain and index.php).
	 *
	 * @param   string  URI to make a full URL for (or name of a named route)
	 * @param   array   Array of named params for named routes
	 * @return  string
	 */
	public function url($uri = '', $named_params = array())
	{
		if ($named_uri = \Router::get($uri, $named_params))
		{
			$uri = $named_uri;
		}

		return \Uri::create($uri);
	}

	public function fuel_version()
	{
		return \Fuel::VERSION;
	}

	public function theme_asset_css($stylesheets = array(), $attr = array(), $group = null, $raw = false)
	{
		return \Theme::instance()->asset->css($stylesheets, $attr, $group, $raw);
	}

	public function theme_asset_js($scripts = array(), $attr = array(), $group = null, $raw = false)
	{
		return \Theme::instance()->asset->js($scripts, $attr, $group, $raw);
	}

	public function theme_asset_img($images = array(), $attr = array(), $group = null)
	{
		return \Theme::instance()->asset->img($images, $attr, $group);
	}
}
