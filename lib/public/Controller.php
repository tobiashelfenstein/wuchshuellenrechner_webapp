<?php

namespace wuchshuellenrechner\library;


abstract class Controller {

	protected $url;

	protected $model;
	protected $view;

	public function __construct() {
		// define view
		// $view = new \Wuchshuellenrechner\Library\View('core', $controllerName, $actionName);
		//$this->getUrl();

		//$controller = get_class($this);
		//$action = $this->getAction();
		//$this->view = new \Wuchshuellenrechner\Library\View('core', $controller, $action);
		$this->view = new \wuchshuellenrechner\library\view();
	}

	protected function getAction()
	{
		// define action
		// $actionName = (isset($urlParts[1]) && $urlParts[1] ? $urlParts[1] : 'index');
		// $actionMethodName = ucfirst($actionName) . 'Action';

		return $actionName = ucfirst($this->url[2]);
	}


	private function getUrl() {
		// TODO: noch etwas verbessern
		$url = (isset($_GET['page']) ? $_GET['page'] : '');
		$this->url =  explode('/', $url);
	}


	abstract public function index();


	abstract public function getController();
}
