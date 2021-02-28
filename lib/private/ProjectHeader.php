<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\SessionArea;


class ProjectHeader extends SessionArea {

	// initializes operation specific values as strings
	public $operation = '';
	public $district = '';
	public $manager = '';
	public $location = '';

	// initializes project specific sales tax as boolean
	public $tax = true;

	// initializes project specific planting specific values as integers
	public $length = 0;
	public $count = 0;


	public function __construct($operation, $district, $manager, $location, $tax=true, $length=400, $count=900) {

		// initialize private variables
		$this->operation = $operation;
		$this->district = $district;
		$this->manager = $manager;
		$this->location = $location;

		$this->tax = $tax;

		$this->length = $length;
		$this->count = $count;
	}


	public function getSource() {

		// define model
		return 'ProjectHeader';
	}
}
