<?php

class Cookie {

	private static $instance;
	private const EXPIRES = 31536000;

	public static function getInstace() {
		return static::$instance ?? static::$instance = new static();
	}

	private function __construct() {}

	public function setCookie($name, $value, $expires = self::EXPIRES) {
		setcookie($name, $value, time() + $expires, '/');
	}

	public function getCookie($name) {
		return $_COOKIE[$name] ?? null;
	}	

	public function deleteCookie($name) {
		if (isset($_COOKIE[$name])) {
			setcookie($name);
		}
	}

	public function updateCookie($name, $value, $expires = self::EXPIRES) {
		static::setCookie($name, $value, $expires);
	}

}
