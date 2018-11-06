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

use Router;
use Uri;
use Twig_Extension;
use Twig_SimpleFunction;
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
		// new Twig 2.x syntax
		if (class_exists('Twig_SimpleFunction'))
		{
			return array(
				new Twig_SimpleFunction('fuel_version', array($this, 'fuel_version')),
				new Twig_SimpleFunction('url', array($this, 'url')),

				new Twig_SimpleFunction('base_url', array('Uri', 'base')),
				new Twig_SimpleFunction('current_url', array('Uri', 'current')),
				new Twig_SimpleFunction('uri_segment' , array('Uri', 'segment')),
				new Twig_SimpleFunction('uri_segments', array('Uri', 'segments')),

				new Twig_SimpleFunction('config', array('Config', 'get')),

				new Twig_SimpleFunction('dump', array('Debug', 'dump')),

				new Twig_SimpleFunction('lang', array('Lang', 'get')),

				new Twig_SimpleFunction('form_open', array('Form', 'open')),
				new Twig_SimpleFunction('form_close', array('Form', 'close')),
				new Twig_SimpleFunction('form_input', array('Form', 'input')),
				new Twig_SimpleFunction('form_password', array('Form', 'password')),
				new Twig_SimpleFunction('form_hidden', array('Form', 'hidden')),
				new Twig_SimpleFunction('form_radio' , array('Form', 'radio')),
				new Twig_SimpleFunction('form_checkbox', array('Form', 'checkbox')),
				new Twig_SimpleFunction('form_textarea', array('Form', 'textarea')),
				new Twig_SimpleFunction('form_file', array('Form', 'file')),
				new Twig_SimpleFunction('form_button', array('Form', 'button')),
				new Twig_SimpleFunction('form_reset', array('Form', 'reset')),
				new Twig_SimpleFunction('form_submit', array('Form', 'submit')),
				new Twig_SimpleFunction('form_select', array('Form', 'select')),
				new Twig_SimpleFunction('form_label', array('Form', 'label')),

				new Twig_SimpleFunction('form_val', array('Input', 'param')),
				new Twig_SimpleFunction('input_get', array('Input', 'get')),
				new Twig_SimpleFunction('input_post', array('Input', 'post')),

				new Twig_SimpleFunction('asset_add_path', array('Asset', 'add_path')),
				new Twig_SimpleFunction('asset_css', array('Asset', 'css')),
				new Twig_SimpleFunction('asset_js', array('Asset', 'js')),
				new Twig_SimpleFunction('asset_img', array('Asset', 'img')),
				new Twig_SimpleFunction('asset_render', array('Asset', 'render')),
				new Twig_SimpleFunction('asset_find_file', array('Asset', 'find_file')),

				new Twig_SimpleFunction('theme_asset_css', array($this, 'theme_asset_css')),
				new Twig_SimpleFunction('theme_asset_js', array($this, 'theme_asset_js')),
				new Twig_SimpleFunction('theme_asset_img', array($this, 'theme_asset_img')),

				new Twig_SimpleFunction('html_anchor', array('Html', 'anchor')),
				new Twig_SimpleFunction('html_mail_to_safe', array('Html', 'mail_to_safe')),

				new Twig_SimpleFunction('session_get', array('Session', 'get')),
				new Twig_SimpleFunction('session_get_flash', array('Session', 'get_flash')),

				new Twig_SimpleFunction('security_js_fetch_token', array('Security', 'js_fetch_token')),
				new Twig_SimpleFunction('security_js_set_token', array('Security', 'js_set_token')),

				new Twig_SimpleFunction('markdown_parse', array('Markdown', 'parse')),

				new Twig_SimpleFunction('auth_has_access', array('Auth', 'has_access')),
				new Twig_SimpleFunction('auth_check', array('Auth', 'check')),
				new Twig_SimpleFunction('auth_get', array('Auth', 'get')),
			);
		}

		// backward compatibility for twig 1.x
		else
		{
			return array(
				'fuel_version'            => new Twig_Function_Method($this, 'fuel_version'),
				'url'                     => new Twig_Function_Method($this, 'url'),

				'base_url'                => new Twig_Function_Function('Uri::base'),
				'current_url'             => new Twig_Function_Function('Uri::current'),
				'uri_segment'             => new Twig_Function_Function('Uri::segment'),
				'uri_segments'            => new Twig_Function_Function('Uri::segments'),

				'config'                  => new Twig_Function_Function('Config::get'),

				'dump'                    => new Twig_Function_Function('Debug::dump'),

				'lang'                    => new Twig_Function_Function('Lang::get'),

				'form_open'               => new Twig_Function_Function('Form::open'),
				'form_close'              => new Twig_Function_Function('Form::close'),
				'form_input'              => new Twig_Function_Function('Form::input'),
				'form_password'           => new Twig_Function_Function('Form::password'),
				'form_hidden'             => new Twig_Function_Function('Form::hidden'),
				'form_radio'              => new Twig_Function_Function('Form::radio'),
				'form_checkbox'           => new Twig_Function_Function('Form::checkbox'),
				'form_textarea'           => new Twig_Function_Function('Form::textarea'),
				'form_file'               => new Twig_Function_Function('Form::file'),
				'form_button'             => new Twig_Function_Function('Form::button'),
				'form_reset'              => new Twig_Function_Function('Form::reset'),
				'form_submit'             => new Twig_Function_Function('Form::submit'),
				'form_select'             => new Twig_Function_Function('Form::select'),
				'form_label'              => new Twig_Function_Function('Form::label'),

				'form_val'                => new Twig_Function_Function('Input::param'),
				'input_get'               => new Twig_Function_Function('Input::get'),
				'input_post'              => new Twig_Function_Function('Input::post'),

				'asset_add_path'          => new Twig_Function_Function('Asset::add_path'),
				'asset_css'               => new Twig_Function_Function('Asset::css'),
				'asset_js'                => new Twig_Function_Function('Asset::js'),
				'asset_img'               => new Twig_Function_Function('Asset::img'),
				'asset_render'            => new Twig_Function_Function('Asset::render'),
				'asset_find_file'         => new Twig_Function_Function('Asset::find_file'),

				'theme_asset_css'         => new Twig_Function_Method($this, 'theme_asset_css'),
				'theme_asset_js'          => new Twig_Function_Method($this, 'theme_asset_js'),
				'theme_asset_img'         => new Twig_Function_Method($this, 'theme_asset_img'),

				'html_anchor'             => new Twig_Function_Function('Html::anchor'),
				'html_mail_to_safe'       => new Twig_Function_Function('Html::mail_to_safe'),

				'session_get'             => new Twig_Function_Function('Session::get'),
				'session_get_flash'       => new Twig_Function_Function('Session::get_flash'),

				'security_js_fetch_token' => new Twig_Function_Function('Security::js_fetch_token'),
				'security_js_set_token'   => new Twig_Function_Function('Security::js_set_token'),

				'markdown_parse'          => new Twig_Function_Function('Markdown::parse'),

				'auth_has_access'         => new Twig_Function_Function('Auth::has_access'),
				'auth_check'              => new Twig_Function_Function('Auth::check'),
				'auth_get'                => new Twig_Function_Function('Auth::get'),
			);
		}
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
