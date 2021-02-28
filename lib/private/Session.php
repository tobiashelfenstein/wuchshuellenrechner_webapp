<?php

// from https://www.php.net/manual/de/function.session-start.php

namespace Wuchshuellenrechner\Library;

class Session {

	const SESSION_STARTED = true;
	const SESSION_NOT_STARTED = false;

	// state of the session
	private $sessionState = self::SESSION_NOT_STARTED;

	// only instance of the class
	private static $sessionInstance;


	private function __construct() {}


	public static function getInstance() {

		if (!isset(self::$sessionInstance)) {
			self::$sessionInstance = new self;
		}

		self::$sessionInstance->startSession();

		return self::$sessionInstance;
	}


	public function startSession() {

		if ($this->sessionState == self::SESSION_NOT_STARTED) {
			$this->sessionState = session_start();
		}

		return $this->sessionState;
	}


	public function __set($key, $value) {

		$_SESSION[$key] = $value;
	}


	public function __get($key) {

		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}


	private function count() {

		return count($_SESSION);
	}


	public function id($key) {

		// sollte eigentlich an einer anderen Stelle programmiert werden
		// gehört hier nicht her

		if (isset($_SESSION[$key]['id'])) {
			return $_SESSION[$key]['id'];
		}

		return $this->count() - 1;
	}


	public function __isset($key) {

		return isset($_SESSION[$key]);
	}


	public function __unset($key) {

		unset($_SESSION[$key]);
	}


	public function destroy() {

		if ($this->sessionState == self::SESSION_STARTED) {
			$this->sessionState = !session_destroy();
			unset($_SESSION);

			return !$this->sessionState;
		}

		return false;
	}
}
