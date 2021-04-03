<?php

namespace Wuchshuellenrechner\Controller;


class IndexController implements IController {

	protected $model;
	protected $view;

	public function setView($v)
	{
		$this->view = $v;
	}


	public function setModel()
	{
		// no model
	}


	public function indexAction() {
		// no action
	}
}
