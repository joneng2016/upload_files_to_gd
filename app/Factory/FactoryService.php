<?php

namespace App\Factory;

class FactoryService {

	public static $instance;
		
	private function __construct() {}

	static public function start() {

		if (self::$instance == null) {
			self::$instance = new FactoryService();
			return self::$instance;
		}

		return self::$instance;

	}

	public function googleApiService() {
		return new \App\Service\GoogleApiService();
	}
}