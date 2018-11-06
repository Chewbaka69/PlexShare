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

\Autoloader::add_core_namespace('Parser');

\Autoloader::add_classes(array(
	'Parser\\View'                  => __DIR__.'/classes/view.php',
	'Parser\\View_Dwoo'             => __DIR__.'/classes/view/dwoo.php',
	'Parser\\View_Mustache'         => __DIR__.'/classes/view/mustache.php',
	'Parser\\View_Markdown'         => __DIR__.'/classes/view/markdown.php',
	'Parser\\View_Twig'             => __DIR__.'/classes/view/twig.php',
	'Parser\\View_HamlTwig'         => __DIR__.'/classes/view/hamltwig.php',
	'Parser\\View_Jade'             => __DIR__.'/classes/view/jade.php',
	'Parser\\View_Handlebars'       => __DIR__.'/classes/view/handlebars.php',
	'Parser\\View_Haml'             => __DIR__.'/classes/view/haml.php',
	'Parser\\View_Smarty'           => __DIR__.'/classes/view/smarty.php',
	'Parser\\View_Phptal'           => __DIR__.'/classes/view/phptal.php',
	'Parser\\View_Lex'              => __DIR__.'/classes/view/lex.php',

	'Parser\\Twig_Fuel_Extension'   => __DIR__.'/classes/twig/fuel/extension.php',
	'Parser\\Smarty_Fuel_Extension' => __DIR__.'/classes/smarty/fuel/extension.php',
));
