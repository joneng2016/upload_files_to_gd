<?php

namespace App\Factory;

class FactoryContexto {

	public static $instance;
		
	private function __construct() {}

	static public function start() {

		if (self::$instance == null) {
			self::$instance = new FactoryContexto();
			return self::$instance;
		}

		return self::$instance;

	}

	public function contextGoogleDriveApiConnection() {
		return new \App\Artefacts\ContextGoogleDriveApiConnection();
	}
}