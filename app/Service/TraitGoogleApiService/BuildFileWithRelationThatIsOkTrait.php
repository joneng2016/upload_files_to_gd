<?php

namespace App\Service\TraitGoogleApiService;

use App\Factory\FactoryHelper;

trait BuildFileWithRelationThatIsOkTrait {

	public function buildFileWithRelationThatIsOk() {

		$this->log->info($this->text->buildProcessFileOrientation);

		$this->context->stateFile = FactoryHelper::start()->stateFile();

		if(!$this->context->stateFile->thisFileExiste()) {

			$this->log->info($this->text->criadoArquivo);			
			
			$this->context->stateFile->thisFileExiste();
			$this->context->stateFile->setInformation(
				$this->context->fileProcess->getFiles()
			);
			
			$this->context->stateFile->createFile();
			$this->context->stateFile->writeInformationOnAddressFile();

		} else $this->log->info($this->text->arquivoExiste);

	}

}