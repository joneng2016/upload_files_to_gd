<?php

namespace App\Factory;

class FactoryHelper {

	public static $instance;
		
	private function __construct() {}

	static public function start() {

		if (self::$instance == null) {
			self::$instance = new FactoryHelper();
			return self::$instance;
		}

		return self::$instance;

	}

	public function filesProcess($baseAddress) {
		return new \App\Helper\FilesProcess($baseAddress);
	}

	public function stateFile() {
		return new \App\Helper\StateFile;
	}
}