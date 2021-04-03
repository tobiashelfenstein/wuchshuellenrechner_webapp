<?php

namespace wuchshuellenrechner\library;


class Application {

	private $url = '';
	private $defaultApplicationName = '';


	public function __construct() {
		$this->getUrl();
	}


	public function setDefaultApplication($app) {
		$this->defaultApplicationName = $app;
	}


	public function start() {
		// if not request
		if (empty($this->url[0])) {
			$this->loadDefaultApplication();
			return false;
		}

		$this->loadApplication();
	}


	private function getUrl() {
		// TODO: noch etwas verbessern
		$url = (isset($_GET['page']) ? $_GET['page'] : '');
		$this->url =  explode('/', $url);
	}


	private function loadDefaultApplication() {
		$appClass = '\\wuchshuellenrechner\\apps\\' . ucfirst($this->defaultApplicationName);

		$this->load($appClass);
	}


	private function loadApplication() {
		$appName = $this->url[0];
		$appClass = '\\wuchshuellenrechner\\apps\\' . ucfirst($appName);

		$this->load($appClass);
	}


	private function load($appClass) {
		$app = new $appClass();
		$app->init();
	}
}
