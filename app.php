<?php

require "vendor/autoload.php";

use App\Log\Log as log;

try {
    
    log::info("start application");

    log::info("read .env file");
} catch (\Throwable $th) {
    log::error($th);
}

