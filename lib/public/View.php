<?php

namespace Wuchshuellenrechner\Library;

class View {

	// view specific values
	protected $path, $controller, $action;

	public function __construct($path, $controllerName, $actionName) {

		// initialize protected variables
		$this->path = $path;
		$this->controller = $controllerName;
		$this->action = $actionName;
	}

	public function renderTemplate() {

		// include main-header template
		include $this->path . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'Main_header.php';

		$tmplFile = $this->path . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $this->controller . DIRECTORY_SEPARATOR . $this->action . '.php';

		// spare the view the bloat of using "$this->vars[]" for every variable
		foreach ($this->vars as $k => $v) {
			$$k = $v;
		}

		// TODO, wenn Datei nicht gefunden wird
		include $tmplFile;

		// include main-footer template
		include $this->path . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'Main_footer.php';
	}

	public function setVars(array $vars) {

		foreach ($vars as $k => $v) {
			$this->vars[$k] = $v;
		}
	}
}
