<?php

namespace App\Service\TraitGoogleApiService;

use App\Factory\FactoryHelper;

trait LoadDataThatHappensUploadTrait {

    public function loadDataThatHappensUpload() {
        
        $this->log->info($this->text->readFilesThatWillBeUploaded);

        $this->context->addressRead = env("PASTA_LEITURA");
        $this->context->fileProcess = FactoryHelper::start()->filesProcess(
        	$this->context->addressRead
        );

		$this->context->fileProcess->listFiles();

    }

}