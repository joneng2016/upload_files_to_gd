	<?php

namespace App\Helper;
 
class StateFile {

	private $nameFile;
	private $addressFile;
	private $information;
	private $informationString = "";
	private $file;

	public function thisFileExiste() {

		$nameFile = $this->nameFile; 
		$this->addressFile = env("WRITE_STATE_FILE");

		return file_exists($this->addressFile);
	}


	public function setInformation($information) {
		$this->information = $information;
	}

	public function createFile() {

		$this->file = fopen($this->addressFile,"w");
	}

	public function writeInformationOnAddressFile() {

		foreach ($this->information as $value)
			$this->informationString .= "{$value}#NOTUPLOADED\n";

		fwrite($this->file,$this->informationString);
		fclose($this->file);
		
	}

	public function onlyAlterFile() {

		foreach ($this->information as $value) {
			$this->informationString .= "$value\n";
		}

		$this->file = fopen($this->addressFile,"w");
		fwrite($this->file,$this->informationString);
		fclose($this->file);

	}

	public function findSpecificFileAndChangeStatus($findFile) {

		$this->file = fopen($this->addressFile,"r");
		$fileReaded = fread($this->file, filesize($this->addressFile));
		fclose($this->file);
		
		$content = explode("\n",$fileReaded);

		foreach($content as $key => $line) {

			$words = explode("#",$line);
			

			if ($words[0] == $findFile){
				$content[$key] = $words[0] . "#OK";
			}

		}

		$this->information = $content;
		$this->onlyAlterFile();

	}


	public function seeIfIsOK($findFile) {

		$this->file = fopen($this->addressFile,"r");
		$fileReaded = fread($this->file, filesize($this->addressFile));
		fclose($this->file);
		
		$content = explode("\n",$fileReaded);
		
		foreach($content as $key => $line) {

			$words = explode("#",$line);
			

			if ($words[1] == "OK") 
				return true;
		}

		return false;
	}
}