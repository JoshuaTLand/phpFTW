<?php

class logger {

	public $log;
	
	function __construct(){
		$this->log = new log();
	}
	
	public function setLogLevel($level){
		
		if(array_key_exists($level, $this->log->logLevels)){
			$this->log->logLevel = $this->log->logLevels[$level];
		}
		else{
			$this->log->logLevel = 0;
		}
	}
}

class log{
		
		public $logLevel;
		public $logFile = DOCROOT."logs".DIRECTORY_SEPARATOR."log.txt";
		
		public $logLevels = [
			"none" => 0,
			"error" => 1,
			"warning" => 2,
			"debug" => 3,
		];
		
		public function debug($message){
			if($this->logLevel >= $this->logLevels["debug"]){
				$this->addToLog("debug", $message);
			}
		}
		
		public function warning($message){	
			if($this->logLevel >= $this->logLevels["warning"]){
				$this->addToLog("warn", $message);
			}		
		}
		
		public function error($message){		
			if($this->logLevel >= $this->logLevels["error"]){
				$this->addToLog("error", $message);
			}		
		}
		
		public function addToLog($level, $message){
			$message = date("[Y.m.d H:i:s] (").$level.")\t".$message."\r\n";
			file_put_contents($this->logFile, $message, FILE_APPEND | LOCK_EX);
		}
}