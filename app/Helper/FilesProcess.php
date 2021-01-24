<?php

namespace App\Helper;

use App\Log\Log as log;

class FilesProcess {
	
	private $baseAddress;
	private $files = [];

	public function __construct($baseAddress) {

		$this->baseAddress = $baseAddress;

	}

	public function listFiles() {

		$baseAddress = -1;
		$args = func_get_args();

		if (sizeof($args) == 0)
			$baseAddress = $this->baseAddress;
		else 
			$baseAddress = $args[0];
		
		$dirScannned = scandir($baseAddress);
		
		foreach($dirScannned as $element) {
			
			log::start()->info("{$baseAddress}\\{$element}\n");

			if (is_dir("{$baseAddress}\\{$element}")) {
				
				if (whereRejetEnterInDir($element))
					$this->listFiles("{$baseAddress}\\{$element}");
			}
			else
				$this->files[] = "{$baseAddress}\\{$element}";

		}
	}
	

	public function getFiles() {
		return $this->files;
	}


	public function mapMySelf($callBack) {
		return array_map($callBack, $this->files);
	}

}