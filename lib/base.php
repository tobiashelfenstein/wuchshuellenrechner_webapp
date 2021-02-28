<?php

require_once __DIR__ . '/autoload.php';

class Wuchshuellenrechner {

	private static $loader = null;
	public static $project = null;


	public function __construct() {

	}

	public static function init() {

		// https://www.php.net/manual/de/function.session-start.php
		//session_start();


		// instantiate the loader and register
		self::$loader = new \Wuchshuellenrechner\Psr4Autoloader;
		self::$loader->register();
		self::$loader->addNamespace('Wuchshuellenrechner\\Library', 'lib/private');
		self::$loader->addNamespace('Wuchshuellenrechner\\Library', 'lib/public');
		self::$loader->addNamespace('Wuchshuellenrechner\\Controller', 'controller');

		self::$project = new \Wuchshuellenrechner\Library\Project();

		// hier muss noch eine bessere Lösung her
		$url = (isset($_GET['_url']) ? $_GET['_url'] : '');
		$urlParts = explode('/', $url);

		$controllerName = (isset($urlParts[0]) && $urlParts[0] ? $urlParts[0] : 'index');
		$controllerClassName = '\\Wuchshuellenrechner\\Controller\\' . ucfirst($controllerName) . 'Controller';

		$actionName = (isset($urlParts[1]) && $urlParts[1] ? $urlParts[1] : 'index');
		$actionMethodName = ucfirst($actionName) . 'Action';

		$view = new \Wuchshuellenrechner\Library\View('core', $controllerName, $actionName);

		$controller = new $controllerClassName();
		$controller->setModel(self::$project);
		$controller->setView($view);

		$controller->$actionMethodName();
		$view->renderTemplate();

	}

}

Wuchshuellenrechner::init();
