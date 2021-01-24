<?php

namespace App\Bootstrap;

use App\Log\Log as log;

class Bootstrap {

	public static $instance;

	private function __construct() {

	}

	public function start() {

		if (self::$instance == null)
			self::$instance = new Bootstrap();

		return self::$instance;

	}

    public function run() {
    
        if (!read_env()) {
            log::error(".env not found");
            return false;
        }
        
        log::info("env readed with success");
        
        ini_set(
        	'curl.cainfo',
        	read_position_application() . "\others\cacert.pem"
        );

    }
    
}