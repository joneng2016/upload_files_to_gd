<?php

namespace App\Service;

use App\Artefacts\TextosDaAplicacao as texts;

use App\Factory\FactoryContexto as factContexto;

use App\Log\Log as log; 

use App\Service\TraitGoogleApiService;

use App\Service\TraitGoogleApiService\StartConnectionTrait;
use App\Service\TraitGoogleApiService\LoadDataThatHappensUploadTrait;
use App\Service\TraitGoogleApiService\BuildFileWithRelationThatIsOkTrait;

class GoogleApiService {

    private $context;
    private $tokenPath;
    private $log;

    public function __construct() {

        $this->context = factContexto::start()->contextGoogleDriveApiConnection();
        $this->tokenPath = read_position_application() . '\storage\token.gs';
        $this->text = texts::start();
        $this->log = log::start();

    }

    use StartConnectionTrait;
    use LoadDataThatHappensUploadTrait;
    use BuildFileWithRelationThatIsOkTrait;
     
}