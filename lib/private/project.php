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

		$header = new \Wuchshuellenrechner\ProjectHeader;

	}

}
