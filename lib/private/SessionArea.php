<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\Session;

abstract class SessionArea {

	const PHP_CLASS_SOURCE = "php_class_object";


	private static $storage;

	protected $source;

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

		if (isset($storage->$area)) {
			foreach (array_keys(get_object_vars($model)) as $key) {
				// don't override instanced objects
				if ($storage->$area[$key] !== self::PHP_CLASS_SOURCE) {
					$model->$key = $model->nullValue($storage->$area[$key]);
				}
			}
		}

		return $model;
	}


	public function save() {

		$area = $this->getSource();
		$storage = $this->getStorage();
		$this->source = self::PHP_CLASS_SOURCE;

		// always update values
		$tmpArea = [];
		foreach (get_object_vars($this) as $key => $value) {
			if ($value instanceof SessionArea) {
				$value = $value->save();
			}
			$tmpArea[$key] = $this->emptyString($value);
		}
		$storage->$area = $tmpArea;

		return $this->source;
	}


	private function emptyString($v) {

		if ($v === null) {
			$v = '';
		}

		return $v;
	}


	private function nullValue($v) {

		if ($v === '') {
			$v = null;
		}

		return $v;
	}


	abstract public function getSource();
}
