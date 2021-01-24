<?php

require "vendor/autoload.php";
require "helper/helper.php";

use App\Artefacts\TextosDaAplicacao as texts;
use App\Factory\FactoryService;

use App\Bootstrap\Bootstrap;
use App\Bootstrap\GlobalSet;

use App\Log\Log as log;

$text = texts::start();

$factoryService = FactoryService::start();

log::start()->info($text->startApplication);
log::start()->info($text->readEnvFile);

$bootstrap = Bootstrap::start();
$globalSet = GlobalSet::start();

$bootstrap->run();
$globalSet->run();

$googleDriveApiConnection = $factoryService->googleApiService();

$googleDriveApiConnection->startConnection();
$googleDriveApiConnection->loadDataThatHappensUpload();
$googleDriveApiConnection->buildFileWithRelationThatIsOk();
$googleDriveApiConnection->uploadFileGoogleApi();