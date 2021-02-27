<?php

namespace Wuchshuellenrechner;

use Wuchshuellenrechner\ProjectHeader;

class Project {

	// species registry
	private $species = null;
	private $variants = 0;

	// project header
	private $header = null;

	public function __construct() {

		$header = new \Wuchshuellenrechner\ProjectHeader("Test1", "Test2", "Test3", "Test4");

	}

}
