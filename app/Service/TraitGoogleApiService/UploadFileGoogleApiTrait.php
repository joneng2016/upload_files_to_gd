<?php

namespace App\Service\TraitGoogleApiService;

use Google_Service_Drive_DriveFile;
use Google_Service_Drive;

trait UploadFileGoogleApiTrait {

	public function uploadFileGoogleApi() {

		$this->context->service = new Google_Service_Drive($this->context->client);

		$this->context->fileProcess->mapMySelf(function($address){	

			$posName = explode("\\",$address);			
			$name = $posName[sizeof($posName)-1];
			

			$file = new Google_Service_Drive_DriveFile($this->context->client);			
			$file->setName("{$name}");
			$file->setParents(["1yITaW-C_ECskm-n6fXOQAiP5IwfPdMpp"]);

			$this->context->service->files->create(
				$file,
				[
					"data" => file_get_contents($address),
					"mimeType" => "application/octet-stream",
					"uploadType" => "multipart"
				]
			);

			dd("*");

		});

	}

}