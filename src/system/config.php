<?php

namespace system;

class config{

	public $db;
	public $paths;
	public $fof;
	public $logLevel;
	public $errorLevel;

	function __construct(){
		$this->getConfig();
	}
	
	function getConfig(){
		require_once(DOCROOT."settings".DIRECTORY_SEPARATOR.ENV.".php");
		
		$this->db = $settings["db"];
		$this->paths = $settings["paths"];
		$this->fof = $settings["404file"];
		$this->logLevel = $settings["logLevel"];
		$this->errorLevel = $settings["errorLevel"];
	}
}