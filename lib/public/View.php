<?php

namespace wuchshuellenrechner\library;

class View {

	// view specific values
	protected $path, $controller, $action;

	protected $vars = []; // TODO

	public function __construct() {

		$this->path = 'core/templates';


		// initialize protected variables
		/*$this->path = $path;
		$this->controller = $controllerName;
		$this->action = $actionName;*/
	}

	public function renderTemplate($controller, $action='index') {

		// include main-header template
		include $this->path . DIRECTORY_SEPARATOR . 'Main_header.php';

		$tmplFile = $this->path . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php';

		// TODO spare the view the bloat of using "$this->vars[]" for every variable
		foreach ($this->vars as $k => $v) {
			$$k = $v;
		}

		// TODO, wenn Datei nicht gefunden wird
		include $tmplFile;

		// include main-footer template
		include $this->path . DIRECTORY_SEPARATOR . 'Main_footer.php';
	}

	public function setVars(array $vars) {

		foreach ($vars as $k => $v) {
			$this->vars[$k] = $v;
		}
	}
}
