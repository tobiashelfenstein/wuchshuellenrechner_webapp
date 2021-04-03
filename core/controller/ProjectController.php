<?php

namespace wuchshuellenrechner\controller;

use wuchshuellenrechner\library\Controller;
use wuchshuellenrechner\library\Project;


class ProjectController extends Controller {

	public function __construct() {
		parent::__construct();

		$this->setModel();
	}


	public function index() {
		$this->view->renderTemplate($this->getController());
	}


	private function setModel() {
		$this->model = \wuchshuellenrechner\library\Project::read();
	}


	public function getController() {
		return 'project';
	}


	public function create() {
		// fill all fields with values
		$this->view->setVars(['header' => $this->model->getHeader()], ['model' => $this->model]);
		$this->view->renderTemplate($this->getController(), 'create');

		// save, when use submitted form
		if (isset($_POST['submit'])) {
			foreach (array_keys(get_object_vars($this->model->getHeader())) as $key) {
				if (isset($_POST[$key])) {
					$this->model->setHeaderAttr($key, $_POST[$key]);
				}
				else {
					// needed to clean empty values e.g. of checkboxes
					$this->model->setHeaderAttr($key, '');
				}
			}

			$this->model->save();

			// redirect to wizards next page
			header('Location: /plants/wizard');
			//die() or exit(); https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
		}
	}
}




/*class ProjectController implements IController {

	protected $model;
	protected $view;

	public function setView($v) {
		$this->view = $v;
	}


	public function setModel() {
		$this->model = \Wuchshuellenrechner\Library\Project::read();
	}


	public function indexAction() {
	}

	public function wizardAction() {
		// fill all fields with values
		$this->view->setVars(['header' => $this->model->getHeader()], ['model' => $this->model]);

		// save, when use submitted form
		if (isset($_POST['submit'])) {
			foreach (array_keys(get_object_vars($this->model->getHeader())) as $key) {
				if (isset($_POST[$key])) {
					$this->model->setHeaderAttr($key, $_POST[$key]);
				}
				else {
					// needed to clean empty values e.g. of checkboxes
					$this->model->setHeaderAttr($key, '');
				}
			}

			$this->model->save();

			// redirect to wizards next page
			header('Location: /plants/wizard');
			//die() or exit(); https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
		}
	}
}*/
