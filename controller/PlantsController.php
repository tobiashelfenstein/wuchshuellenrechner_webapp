<?php

namespace Wuchshuellenrechner\Controller;

use Wuchshuellenrechner\Library\Plants;
use Wuchshuellenrechner\Library\Plant;


class PlantsController implements IController {

	protected $model;
	protected $view;

	public function setView($v)
	{
		$this->view = $v;
	}


	public function setModel()
	{
		$this->model = \Wuchshuellenrechner\Library\Plants::read();
	}


	public function indexAction() {
	}


	public function wizardAction() {

		// fill all fields with values
		//$this->view->setVars(['header' => $this->model->getHeader()], ['model' => $this->model]);

		// save, when use submitted form
		if (isset($_POST['submit'])) {
			$plant = new \Wuchshuellenrechner\Library\Plant();
			foreach (array_keys(get_object_vars($plant)) as $key) {
				if (isset($_POST[$key])) {
					$plant->$key = $_POST[$key];
				}
				else {
					// needed to clean empty values e.g. of checkboxes
					$plant->$key = '';
				}
			}
			$this->model->addPlant($plant);
		}

		$this->model->save();

	}
}
