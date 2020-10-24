<?php

require "vendor/autoload.php";
require "helper/helper.php";

// use App\Service\GoogleDriveApiService;
use App\Log\Log as log;

log::info("start application");

log::info("read .env file");
    
if (!read_env()) {
    log::error(".env not found");
    return false;
}

log::info("env readed with success");

//$googleDrieApiConnection = new GoogleDriveApiService();

//$googleDrieApiConnection->readCredentials();
//$googleDrieApiConnection->startConnection();