<?php

namespace Wuchshuellenrechner\Controller;

use Wuchshuellenrechner\Library\Project;


class ProjectController implements IController {

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
			foreach ($this->model->getHeader() as $key => $value) {
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
