<?php

namespace App\Bootstrap;

use App\Log\Log as log;

class Bootstrap {
    static public function run() {
        if (!read_env()) {
            log::error(".env not found");
            return false;
        }
        
        log::info("env readed with success");
        
        ini_set('curl.cainfo',read_position_application() . "\others\cacert.pem");
    }
}