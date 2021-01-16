<?php

require "vendor/autoload.php";
require "helper/helper.php";

use App\Artefacts\TextosDaAplicacao as texts;
use App\Factory\FactoryService;
use App\Bootstrap\Bootstrap;
use App\Log\Log as log;

$text = texts::start();
$factoryService = FactoryService::start();

log::start()->info($text->startApplication);
log::start()->info($text->readEnvFile);

Bootstrap::run();

$googleDriveApiConnection = $factoryService->googleApiService();

$googleDriveApiConnection->startConnection();
$googleDriveApiConnection->loadDataThatHappensUpload();
$googleDriveApiConnection->buildFileWithRelationThatIsOkTrait();