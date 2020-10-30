<?php

require "vendor/autoload.php";
require "helper/helper.php";

use App\Service\GoogleApiService;
use App\Bootstrap\Bootstrap;
use App\Log\Log as log;

log::info("start application");
log::info("read .env file");

Bootstrap::run();

$googleDriveApiConnection = new GoogleApiService();

$googleDriveApiConnection->startConnection();