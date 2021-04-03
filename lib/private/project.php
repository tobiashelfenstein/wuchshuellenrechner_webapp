<?php

namespace Wuchshuellenrechner\Library;

use wuchshuellenrechner\library\SessionArea;
use wuchshuellenrechner\library\ProjectHeader;


class Project extends SessionArea {

	// species registry
	protected $species = null;
	protected $variants = 0;

	// project header
	protected $header = null;


	public function __construct() {

		$this->header = \wuchshuellenrechner\library\ProjectHeader::read();

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
