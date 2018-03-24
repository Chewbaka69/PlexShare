# Parser package

## Installing

Simply add `parser` to your config.php `always_loaded.packages` config option.

## Included Parsers

* Markdown - A PHP version of Markdown by Michel Fortin.

## Usage

```php
// old usage still valid, will load app/views/example.php
View::forge('example');

// load a Mustache template, will load and parse app/views/example.mustache
View::forge('example.mustache');

// load a Twig template, will load and parse app/views/example.twig
View::forge('example.twig');

// load a Hybrid Haml / Twig template, ATTENTION: this one expects app/views/example.twig and {% haml %} code at the top of the view
View::forge('example.mthaml');

// load a Jade template, will load and parse app/views/example.jade
View::forge('example.jade');

// load a Haml template, will load and parse app/views/example.haml
View::forge('example.haml');

// load a Smarty template, will load and parse app/views/example.smarty
View::forge('example.smarty');

// load a Lex template, will load and parse app/views/example.lex
View::forge('example.lex');

// load a Dwoo template, ATTENTION: this one expects app/views/example.tpl
View::forge('example.dwoo');
```

## Installing parsers

To be able to use one of the supported parsers, you need to install them via composer.
Simply add the libraries to your project's `composer.json` then run `php composer.phar install`:

```json
{
    "require": {
        "dwoo/dwoo" : "*",
        "mustache/mustache" : "*",
        "smarty/smarty" : "*",
        "twig/twig" : "*",
        "mthaml/mthaml": "*",
		"pyrocms/lex": "*"
    }
}
```

Note that the  Markdown parser is installed by default, as it is also used by the FuelPHP core class `Markdown`.

Libraries that can not be installed through composer are expected to be installed in in `APPPATH/vendor/lib_name` (capitalize lib_name),
and you'll have to download them yourself. Don't change the casing or anything, keep it as much original as possible within the `vendor/lib_name`
dir to keep updating easy (also because some come with their own autoloader).

You can configure them to be loaded from other locations by copying the parser.php config file to your app and editing it.

## Config and runtime config

Currently the drivers still lack a lot of config options they should probably accept. They are currently all configured to work with one instance of their parser library, which is available to config:

```php
// Clear the cache for a specific Smarty template
$view = View::forge('example.smarty');
$view->parser()->clearCache('example.smarty');

// Example static usage
View_Smarty::parser()->clearCache('example.smarty');
```
