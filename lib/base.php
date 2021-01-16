<?php

class Wuchshuellenrechner {

	public static $project = null;

	public function __construct() {

	}

	public static function init() {
		self::$project = new \Wuchshuellenrechner\Project();

	}

}

Wuchshuellenrechner::init();
