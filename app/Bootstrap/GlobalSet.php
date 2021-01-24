<?php

namespace App\Bootstrap;

use App\Log\Log as log;

class GlobalSet {

	public static $instance;

	private function __construct() {

	}

	public function start() {

		if (self::$instance == null)
			self::$instance = new GlobalSet();

		return self::$instance;

	}

	public function run() {
		$_ENV["PASTA_LEITURA"] = "C:\\Users\\FRANCIELE\\Pictures";
	}
}