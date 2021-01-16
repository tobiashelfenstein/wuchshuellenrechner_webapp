<?php

namespace Wuchshuellenrechner;

class ProjectHeader {

	// initializes operation specific values as strings
	private $operation = "";
	private $district = "";
	private $manager = "";
	private $location = "";

	// initializes project specific sales tax as boolean
	private $tax = true;

	// initializes project specific planting specific values as integers
	private $length = 0;
	private $count = 0;

	// initializes chart specific values as integers
	// TODO private $view = null;


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
}
