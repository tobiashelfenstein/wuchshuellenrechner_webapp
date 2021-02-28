<?php

namespace Wuchshuellenrechner\Controller;

use Wuchshuellenrechner\Library\Project;


class IndexController implements IController {

	protected $model;
	protected $view;

	public function setView(\Wuchshuellenrechner\Library\View $v)
	{
		$this->view = $v;
	}


	public function setModel(\Wuchshuellenrechner\Library\Project $p)
	{
		$this->model = $p;
	}


	public function indexAction() {
		$this->view->setVars(['header' => $this->model->getHeader()]);

		$this->model->save();
	}
}
