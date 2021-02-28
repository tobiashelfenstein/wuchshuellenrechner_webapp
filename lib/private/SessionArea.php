<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\Session;

abstract class SessionArea {

	private static $storage;

	protected $id;

	public function getStorage() {
		// anstelle von getStorage wäre natürlich der direkte Zugriff auf $_SESSION möglich
		// from https://www.php.net/manual/de/function.session-start.php

		if (self::$storage === null) {
			self::$storage = Session::getInstance();
		}

		return self::$storage;
	}


	public static function read() {

		$model = new static();
		$area = $model->getSource();

		$storage = $model->getStorage();

		$fields = [];
		if (isset($storage->$area)) {
			$fields = $storage->$area;
		}

		$this->setFields($fields);
	}


	public function save() {

		$area = $this->getSource();

		$storage = $this->getStorage();
		if (!isset($storage->$area)) {
			$storage->$area = [];
		}
		$this->id = $storage->id($area);

		// always update values
		$fields = $this->getFields();
		//$fields = get_class_vars($this);
		$tmpArea = [];
		foreach ($fields as $key => $value) {
			if ($value instanceof SessionArea) {
				$value = $value->save();
			}
			$tmpArea[$key] = $value;
		}
		$storage->$area = $tmpArea;

		return $this->id;
	}


	private function getFields() {

		$fields = [];
		foreach ($this as $name => $value) {
			if ($value === null) {
				$fields[$name] = '';
			}
			else {
				$fields[$name] = $value;
			}
		}

		return $fields;
	}


	private function setFields($fields) {

		foreach ($fields as $name => $value) {
			$this->name = $value;
		}
	}

	abstract public function getSource();
}
