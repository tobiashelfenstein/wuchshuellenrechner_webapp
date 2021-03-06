<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\SessionArea;


class Plant extends SessionArea {

	// initializes operation specific values as strings
	public $id = null;
	public $species = '';
	public $cost = '';
	public $preparation = '';
	public $planting = '';
	public $tending = '';


	public function __construct() {

		// initialize private variables
		/*$this->operation = $operation;
		$this->district = $district;
		$this->manager = $manager;
		$this->location = $location;

		$this->tax = $tax;

		$this->length = $length;
		$this->count = $count;*/

	}


	public function getSource() {

		// define model
		return 'Plant' . $this->id;
	}
}
