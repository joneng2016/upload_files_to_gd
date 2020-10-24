<?php

require "vendor/autoload.php";

use App\Log\Log as log;

try {
    log::info("start application");    
} catch (\Throwable $th) {
    log::error($th);
}

