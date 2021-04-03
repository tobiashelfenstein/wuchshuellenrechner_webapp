<?php

namespace wuchshuellenrechner\library;


abstract class App {

	protected $url = '';
	protected $defaultControllerName = '';
	protected $controller = null;


	public function __construct() {
		$this->getUrl();
	}

	public function setDefaultController($controller) {
		$this->defaultControllerName = $controller;
	}


	public function init() {
		// if not specific request
		if (empty($this->url[1])) {
			$this->loadDefaultController();	// calls index action
			return false;
		}

		$this->loadController();
		$this->callAction();
	}


	private function getUrl() {
		// TODO: noch etwas verbessern
		$url = (isset($_GET['page']) ? $_GET['page'] : '');
		$this->url =  explode('/', $url);
	}


	private function loadDefaultController() {
		$ctrlClass = '\\wuchshuellenrechner\\controller\\' . ucfirst($this->defaultControllerName) . 'Controller';

		$this->controller = new $ctrlClass();
		$this->controller->index();
	}


	private function loadController() {
		$ctrlName = $this->url[1];
		$ctrlClass = '\\wuchshuellenrechner\\controller\\' . ucfirst($ctrlName) . 'Controller';

		$this->controller = new $ctrlClass();
	}


	private function callAction() {
		unset($this->url[1]);
		$action = 'index';	// default action, if non is set

		if (is_callable(array($this->controller, $this->url[2]))) {
			$action = $this->url[2];	// TODO array_shift
		}

		// call action
		$this->controller->$action();
	}


	abstract public function getApplication();
}
