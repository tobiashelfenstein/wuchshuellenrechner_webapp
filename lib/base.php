<?php

require_once __DIR__ . '/autoload.php';

class Wuchshuellenrechner {

	private static $loader = null;
	public static $project = null;


	public function __construct() {

	}

	public static function init() {

		// instantiate the loader
		self::$loader = new \Wuchshuellenrechner\Psr4Autoloader;

		// register the autoloader
		self::$loader->register();

		// register the base directories for the namespace prefix
		self::$loader->addNamespace('Wuchshuellenrechner', 'lib/private');

		self::$project = new \Wuchshuellenrechner\Project();

	}

}

Wuchshuellenrechner::init();
