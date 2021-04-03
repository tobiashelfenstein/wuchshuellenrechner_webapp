<?php

namespace wuchshuellenrechner\controller;

use wuchshuellenrechner\library\Controller;


class StartController extends Controller {
	

	public function index() {
		$this->view->renderTemplate($this->getController());
	}


	public function getController() {
		return 'start';
	}
}
