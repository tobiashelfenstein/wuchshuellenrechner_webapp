<?php

namespace Wuchshuellenrechner\Library;

use Wuchshuellenrechner\Library\Session;

abstract class SessionArea {

	const PHP_CLASS_SOURCE = "php_class_object";
	const PHP_ARRAY_SOURCE = "php_array_object";


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


	public static function read($area = '') {

		$model = new static();
		$storage = $model->getStorage();

		// use parameter, else get area from class
		if (empty($area)) {
			$area = $model->getSource();
		}

		if (isset($storage->$area)) {
			foreach (array_keys(get_object_vars($model)) as $key) {
				// don't override instanced objects
				if (!in_array($storage->$area[$key], $model->sourceStrings())) {
					$model->$key = $model->nullValue($storage->$area[$key]);
				}
			}
		}

		return $model;
	}


	public static function readAll($pattern) {

		//TODO
		// temporary model to open connection to storage
		//$model = new self();
		$model = new static();
		$storage = $model->getStorage();

		$container = [];
		$pattern = '/^' . $pattern . '\d+$/';	// e.g. plant1 or plant100 but not plants
		foreach ($storage as $area => $value) {
			if (preg_match($pattern, $area)) {
				// new instance from class
				$current = new static();
				foreach (array_keys(get_object_vars($current)) as $key) {
					$current->$key = $current->nullValue($storage->$area[$key]);
				}

				// add new instance to array
				$container[] = $current;
			}
		}

		return $container;
	}


	public function save() {

		$storage = $this->getStorage();

		$area = $this->getSource();
		$this->source = self::PHP_CLASS_SOURCE;

		// always update values
		$tmpArea = [];
		foreach (get_object_vars($this) as $key => $value) {
			if ($value instanceof SessionArea) {
				$value = $value->save();
			}
			elseif (is_array($value)) {
				for ($i=0; $i < count($value); $i++) {
					$value[$i]->save();
				}
				$value = self::PHP_ARRAY_SOURCE;
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


	private function sourceStrings() {

		return array(
			self::PHP_CLASS_SOURCE,
			self::PHP_ARRAY_SOURCE,
		);
	}


	abstract public function getSource();
}
