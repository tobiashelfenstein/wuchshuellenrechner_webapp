<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\SessionArea;
use Wuchshuellenrechner\Library\ProjectHeader;


class Project extends SessionArea {

	// species registry
	protected $species = null;
	protected $variants = 0;

	// project header
	protected $header = null;


	public function __construct() {

		$this->header = \Wuchshuellenrechner\Library\ProjectHeader::read();

	}


	public function getSource() {
		// define area
		return 'Project';
	}


	public function getHeader() {
		return $this->header;
	}


	public function setHeaderAttr($key, $value) {

		$this->header->$key = $value;
	}


	public function getHeaderAttr($key) {
	}

}
