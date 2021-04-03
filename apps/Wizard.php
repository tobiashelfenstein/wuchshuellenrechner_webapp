<?php

namespace wuchshuellenrechner\apps;

use wuchshuellenrechner\library\App;
use wuchshuellenrechner\controller\ProjectController;


class Wizard extends App {


	public function getApplication() {
		// define area
		return 'Wizard';
	}


	public function init() {
		//$this->setDefaultController('start');	//TODO defaultControllerName not set
		parent::init();
	}

}
