<?php

namespace App\Helper;
 
class StateFile {

	private $nameFile;
	private $addressFile;
	private $information;

	public function __construct() {
		$this->nameFile = env("FILE_WHERE_SAVE_STATE");
	}

	public function thisFileExiste() {

		$nameFile = $this->nameFile; 
		$this->addressFile = __DIR__ .  "\..\..\storage\\{$nameFile}";

		return file_exists($this->addressFile);
	}


	public function setInformation($information) {
		$this->information = $information;
	}

	public function createFile() {
		fopen($this->addressFile,"w");
	}

	public function writeInformationOnAddressFile() {

		var_dump($this->information);
	}
}