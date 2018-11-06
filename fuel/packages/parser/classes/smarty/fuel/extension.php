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

use Asset;
use Auth;
use Config;
use Form;
use Html;
use Input;
use Lang;
use Markdown;
use Router;
use Session;
use Uri;

/**
 * Provides Smarty support for commonly used FuelPHP classes and methods.
 */
class Smarty_Fuel_Extension
{
	/**
	 * Sets up all of the functions this extension makes available.
	 */
	public function __construct(\Smarty $smarty)
	{
		$smarty->registerPlugin('function', 'fuel_version', array($this, 'fuel_version'));
		$smarty->registerPlugin('function', 'url', array($this, 'url'));
		$smarty->registerPlugin('function', 'base_url', array('Uri', 'base'));
		$smarty->registerPlugin('function', 'current_url', array('Uri', 'current'));
		$smarty->registerPlugin('function', 'uri_segment', array($this, 'uri_segment'));
		$smarty->registerPlugin('function', 'uri_segments', array('Uri', 'segments'));
		$smarty->registerPlugin('function', 'config', array($this, 'config_get'));
		$smarty->registerPlugin('function', 'lang', array($this, 'lang_get'));
		$smarty->registerPlugin('block', 'form', array($this, 'form'));
		$smarty->registerPlugin('function', 'form_input', array($this, 'form_input'));
		$smarty->registerPlugin('function', 'form_password', array($this, 'form_password'));
		$smarty->registerPlugin('function', 'form_hidden', array($this, 'form_hidden'));
		$smarty->registerPlugin('function', 'form_button', array($this, 'form_button'));
		$smarty->registerPlugin('function', 'form_reset', array($this, 'form_reset'));
		$smarty->registerPlugin('function', 'form_submit', array($this, 'form_submit'));
		$smarty->registerPlugin('function', 'form_textarea', array($this, 'form_textarea'));
		$smarty->registerPlugin('block', 'form_fieldset', array($this, 'form_fieldset'));
		$smarty->registerPlugin('function', 'form_label', array($this, 'form_label'));
		$smarty->registerPlugin('function', 'form_checkbox', array($this, 'form_checkbox'));
		$smarty->registerPlugin('function', 'form_radio', array($this, 'form_radio'));
		$smarty->registerPlugin('function', 'form_file', array($this, 'form_file'));
		$smarty->registerPlugin('function', 'form_select', array($this, 'form_select'));
		$smarty->registerPlugin('function', 'form_val', array($this, 'form_val'));
		$smarty->registerPlugin('function', 'input_get', array($this, 'input_get'));
		$smarty->registerPlugin('function', 'input_post', array($this, 'input_post'));
		$smarty->registerPlugin('function', 'asset_add_path', array($this, 'asset_add_path'));
		$smarty->registerPlugin('function', 'asset_css', array($this, 'asset_css'));
		$smarty->registerPlugin('function', 'asset_js', array($this, 'asset_js'));
		$smarty->registerPlugin('function', 'asset_img', array($this, 'asset_img'));
		$smarty->registerPlugin('function', 'asset_render', array($this, 'asset_render'));
		$smarty->registerPlugin('function', 'asset_find_file', array($this, 'asset_find_file'));
		$smarty->registerPlugin('function', 'html_anchor', array($this, 'html_anchor'));
		$smarty->registerPlugin('function', 'session_get_flash', array($this, 'session_get_flash'));
		$smarty->registerPlugin('block', 'markdown', array($this, 'markdown_parse'));
		$smarty->registerPlugin('function', 'auth_has_access', array($this, 'auth_has_access'));
		$smarty->registerPlugin('function', 'auth_check', array($this, 'auth_check'));
	}

	/**
	 * Return the current Fuel version
	 */
	public function fuel_version()
	{
		return \Fuel::VERSION;
	}

	/**
	 * Provides the url() functionality.  Generates a full url (including
	 * domain and index.php).
	 *
	 * Usage: {url uri='' params=[name=>$value]}
	 *
	 * @return  string
	 */
	public function url($params)
	{
		$uri = isset($params['uri']) ? $params['uri'] : '';
		$named_params = isset($params['params']) ? $params['params'] : array();
		if ($named_uri = \Router::get($uri, $named_params))
		{
			$uri = $named_uri;
		}
		return \Uri::create($uri);
	}

	/**
	 * Usage: {uri_segment segment=''}
	 * Required: segment
	 *
	 * @return  mixed segment string or false
	 */
	public function uri_segment($params)
	{
		if (isset($params['segment']))
		{
			return \Uri::segment($params['segment']);
		}
		return false;
	}

	/**
	 * Usage: {config item='' default=''}
	 * Required: item
	 *
	 * @return  mixed string or array
	 */
	public function config_get($params)
	{
		if (isset($params['item']))
		{
			$default = $params['default'] ? null : $params['default'];
			return \Config::get($params['item'], $default);
		}
		return '';
	}

	/**
	 * Usage: {lang line='id' params=[] default='default value' lang='en'}
	 * Required: line
	 *
	 * @return  mixed string or false
	 */
	public function lang_get($params)
	{
		if (isset($params['line']))
		{
			$parameters = isset($params['params']) ? $params['params'] : array();
			$default = isset($params['default']) ? $params['default'] : null;
			$language = isset($params['lang']) ? $params['lang'] : null;
			return \Lang::get($params['line'], $parameters, $default, $language);
		}
		return false;
	}

	/**
	 * Usage: {form attrs=[] hidden=[]}...{/form}
	 *
	 * @return  string
	 */
	public function form($params, $content, $smarty, &$repeat)
	{
		//$content is null when repeat is true and has block content when repeat is false
		if ($repeat)
		{
			$attributes = isset($params['attrs']) ? $params['attrs'] : array();
			$hidden = isset($params['hidden']) ? $params['hidden'] : array();
			return \Form::open($attributes, $hidden);
		}
		else
		{
			return $content . \Form::close();
		}
	}

	/**
	 * Usage: {form_fieldset attrs=[] legend=''}...{/form}
	 *
	 * @return  string
	 */
	public function form_fieldset($params, $content, $smarty, &$repeat)
	{
		//$content is null when repeat is true and has block content when repeat is false
		if ($repeat)
		{
			$attributes = isset($params['attrs']) ? $params['attrs'] : array();
			$legend = isset($params['legend']) ? $params['legend'] : null;
			return \Form::fieldset_open($attributes, $legend);
		}
		else
		{
			return $content . \Form::fieldset_close();
		}
	}

	/**
	 * Usage: {form_input field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_input($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::input($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_password field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_password($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::password($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_hidden field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_hidden($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::hidden($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_button field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_button($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::button($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_submit field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_submit($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::submit($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_reset field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_reset($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::reset($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_textarea field='' value='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_textarea($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::textarea($params['field'], $value, $attributes);
	}

	/**
	 * Usage: {form_label text='' id='' attrs=[]}
	 * Required: text
	 *
	 * @return  string
	 */
	public function form_label($params)
	{
		if ( ! isset($params['text']))
		{
			throw new \UnexpectedValueException("The text parameter is required.");
		}
		$id = isset($params['id']) ? $params['id'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::label($params['text'], $id, $attributes);
	}

	/**
	 * Usage: {form_checkbox field='' value='' checked=false attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_checkbox($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		$checked = isset($params['checked']) ? $params['checked'] : null;
		return \Form::checkbox($params['field'], $value, $checked, $attributes);
	}

	/**
	 * Usage: {form_radio field='' value='' checked=false attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_radio($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$value = isset($params['value']) ? $params['value'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		$checked = isset($params['checked']) ? $params['checked'] : null;
		return \Form::checkbox($params['field'], $value, $checked, $attributes);
	}

	/**
	 * Usage: {form_select field='' values='' options=[] attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_select($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$values = isset($params['values']) ? $params['values'] : null;
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		$options = isset($params['options']) ? $params['options'] : array();
		return \Form::select($params['field'], $values, $options, $attributes);
	}

	/**
	 * Usage: {form_file field='' attrs=[]}
	 * Required: field
	 *
	 * @return  string
	 */
	public function form_file($params)
	{
		if ( ! isset($params['field']))
		{
			throw new \UnexpectedValueException("The field parameter is required.");
		}
		$attributes = isset($params['attrs']) ? $params['attrs'] : array();
		return \Form::file($params['field'], $attributes);
	}

	/**
	 * Provide access to Input::param
	 * Usage: {form_val index='' default=''}
	 *
	 * @return  string
	 */
	public function form_val($params)
	{
		$index = isset($params['index']) ? $params['index'] : null;
		$default = isset($params['default']) ? $params['default'] : null;
		return \Input::param($index, $default);
	}

	/**
	 * Provide access to Input::get
	 * Usage: {input_get index='' default=''}
	 *
	 * @return  string
	 */
	public function input_get($params)
	{
		$index = isset($params['index']) ? $params['index'] : null;
		$default = isset($params['default']) ? $params['default'] : null;
		return \Input::get($index, $default);
	}

	/**
	 * Provide access to Input::post
	 * Usage: {input_post index='' default=''}
	 *
	 * @return  string
	 */
	public function input_post($params)
	{
		$index = isset($params['index']) ? $params['index'] : null;
		$default = isset($params['default']) ? $params['default'] : null;
		return \Input::post($index, $default);
	}

	/**
	 * Provide addess to Asset::add_path
	 * Usage: {form_val path='' type=''}
	 * Required: path
	 *
	 */
	public function asset_add_path($params)
	{
		if ( ! isset($params['path']))
		{
			throw new \UnexpectedValueException('Asset path must be specified');
		}
		$type = isset($params['type']) ? $params['type'] : null;
		\Asset::add_path($params['path'], $type);
	}

	/**
	 * Usage: {asset_css refs='' attrs=[] group='' raw=false}
	 * Required: refs
	 *
	 * @return mixed string or nothing if group is filled
	 */
	public function asset_css($params)
	{
		if ( ! isset($params['refs']))
		{
			throw new \UnexpectedValueException("The refs parameter is required.");
		}
		$group = isset($params['group']) ? $params['group'] : null;
		$attrs = isset($params['attrs']) ? $params['attrs'] : array();
		$raw = isset($params['raw']) ? $params['raw'] : false;
		return \Asset::css($params['refs'], $attrs, $group, $raw);
	}

	/**
	 * Usage: {asset_js refs='' attrs=[] group='' raw=false}
	 * Required: refs
	 *
	 * @return mixed string or nothing if group is filled
	 */
	public function asset_js($params)
	{
		if ( ! isset($params['refs']))
		{
			throw new \UnexpectedValueException("The refs parameter is required.");
		}
		$group = isset($params['group']) ? $params['group'] : null;
		$attrs = isset($params['attrs']) ? $params['attrs'] : array();
		$raw = isset($params['raw']) ? $params['raw'] : false;
		return \Asset::js($params['refs'], $attrs, $group, $raw);
	}

	/**
	 * Usage: {asset_img refs='' attrs=[] group=''}
	 * Required: refs
	 *
	 * @return mixed string or nothing if group is filled
	 */
	public function asset_img($params)
	{
		if ( ! isset($params['refs']))
		{
			throw new \UnexpectedValueException("The refs parameter is required.");
		}
		$group = isset($params['group']) ? $params['group'] : null;
		$attrs = isset($params['attrs']) ? $params['attrs'] : array();
		return \Asset::img($params['refs'], $attrs, $group);
	}

	/**
	 * Render a group of assets
	 * Usage: {asset_render group='' raw=false}
	 *
	 * @return string
	 */
	public function asset_render($params)
	{
		$group = isset($params['group']) ? $params['group'] : null;
		$raw = isset($params['raw']) ? $params['raw'] : false;
		return \Asset::render($group, $raw);
	}

	/**
	 * Usage: {asset_find_file file='' type='' folder=''}
	 * Required: file and type
	 *
	 * @return string
	 */
	public function asset_find_file($params)
	{
		if ( ! isset($params['file']))
		{
			throw new \UnexpectedValueException("The file parameter is required.");
		}
		if ( ! isset($params['type']))
		{
			throw new \UnexpectedValueException("The type parameter is required.");
		}
		$folder = isset($params['folder']) ? $params['folder'] : '';
		return \Asset::find_file($params['file'], $params['type'], $folder);
	}

	/**
	 * Usage: {html_anchor href='' text='' attrs='' secure=false}
	 * Required: href and text
	 *
	 * @return string
	 */
	public function html_anchor($params)
	{
		if ( ! isset($params['href']))
		{
			throw new \UnexpectedValueException("The href parameter is required.");
		}
		if ( ! isset($params['text']))
		{
			throw new \UnexpectedValueException("The text parameter is required.");
		}
		$attrs = isset($params['attrs']) ? $params['attrs'] : array();
		$secure = isset($params['secure']) ? $params['secure'] : null;
		return \Html::anchor($params['href'], $params['text'], $attrs, $secure);
	}

	/**
	 * Usage: {session_get_flash var='' default='' expire=false}
	 * Required: var
	 *
	 * @return mixed
	 */
	public function session_get_flash($params)
	{
		if ( ! isset($params['var']))
		{
			throw new \UnexpectedValueException("The var parameter is required.");
		}
		$default = isset($params['default']) ? $params['default'] : null;
		$expire = isset($params['expire']) ? $params['expire'] : false;
		return \Session::get_flash($params['var'], $default, $expire);
	}

	/**
	 * Usage: {markdown}...{/markdown}
	 *
	 * @return  string
	 */
	public function markdown_parse($params, $content, $smarty, &$repeat)
	{
		//only take action when repeat = false as that is the closing tag
		if (!$repeat)
		{
			return \Markdown::parse($content);
		}
	}

	/**
	 * Usage: {auth_has_access cond=''}
	 * Required: cond
	 *
	 * @return bool
	 */
	public function auth_has_access($params)
	{
		if ( ! isset($params['cond']))
		{
			throw new \UnexpectedValueException("The cond parameter is required.");
		}
		return \Auth::has_access($params['cond']);
	}

	/**
	 * Usage: {auth_check}
	 *
	 * @return bool
	 */
	public function auth_check()
	{
		return \Auth::check();
	}
}
