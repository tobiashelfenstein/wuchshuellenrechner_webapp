<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\SessionArea;
use Wuchshuellenrechner\Library\Plant;


class Plants extends SessionArea {

	// array with all plants
	protected $idCount = 0;		// serial number for plant id's
	protected $allPlants = null;


	public function __construct() {

		// TODO bessere Lösung
		//$plant = null;
		//for ($i=0; $i < $this->numPlants; $i++) {
		//	$plant = \Wuchshuellenrechner\Library\Plant::read();
		//	$this->allPlants[$plant->getSource()] = $plant;
		//}

		$this->allPlants = \Wuchshuellenrechner\Library\Plant::readAll('plant');

	}


	public function getSource() {
		// define area
		return 'Plants';
	}


	public function addPlant($plant) {

		// change id
		$plant->id = $this->idCount;

		$this->allPlants[] = $plant;
		$this->idCount++;
	}

}
