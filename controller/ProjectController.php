<?php

namespace Wuchshuellenrechner\Controller;

use Wuchshuellenrechner\Library\Project;


class ProjectController implements IController {

	protected $model;
	protected $view;

	public function setView($v)
	{
		$this->view = $v;
	}


	public function setModel()
	{
		$this->model = \Wuchshuellenrechner\Library\Project::read();
	}


	public function indexAction() {
		$this->view->setVars(['header' => $this->model->getHeader()], ['model' => $this->model]);

		$this->model->save();
	}
}
