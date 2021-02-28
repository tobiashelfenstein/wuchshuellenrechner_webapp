<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\ModelBase;
use Wuchshuellenrechner\Library\ProjectHeader;


class Project extends ModelBase {

	// species registry
	private $species = null;
	private $variants = 0;

	// project header
	private $header = null;


	public function __construct() {

		$this->header = new \Wuchshuellenrechner\Library\ProjectHeader("Test1", "Test2", "Test3", "Test4");

	}


	public function getSource() {

		// define model
		return 'Project';
	}


	public function getHeader() {
		return $this->header;
	}

}
