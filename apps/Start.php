<?php

namespace wuchshuellenrechner\apps;

use wuchshuellenrechner\library\App;
use wuchshuellenrechner\controller\StartController;


class Start extends App {

	public function getApplication() {
		// define area
		return 'Start';
	}


	public function init() {
		$this->setDefaultController('start');
		parent::init();
	}
}
