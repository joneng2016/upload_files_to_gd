<?php

namespace App\Service\TraitGoogleApiService;

trait UploadFileGoogleApiTrait {

	public function uploadFileGoogleApi() {

		$this->context->fileProcess->mapMySelf(function($address){
			dd($address);
		});

	}

}