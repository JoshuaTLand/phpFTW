<?php

namespace phpFTW\system;
use phpFTW\controllers;

class loader{
	
	public $config;
	public $logger;
	public $dbi;
	
	function __construct(){
		global $config;
		global $logger;
		global $dbi;
		
		$this->config = $config;
		$this->logger = $logger;
		$this->dbi = $dbi;
	
	}
	
	public function loadPath($path){
		
		$this->logger->log->debug("Loading path ".$path);
		
		$fullPath = $this->getRequestPath($path);
		
		$method = $this->getAfterSlash($fullPath);
		if(empty($method)){
			$method = "index";
		}
		
		$controller = $this->getBeforeSlash($fullPath);
		$controller = strtolower($controller);

		$controllerFile = DOCROOT."controllers".DIRECTORY_SEPARATOR.$controller."_controller.php";

		if(file_exists($controllerFile)){
			
			$controllerName = $this->getAfterSlash($controller);
			if(!empty($controllerName)){
				$controllerName = $controllerName."_controller";
			}
			else{
				$controllerName = $controller."_controller";
			}
			
			$controllerName = 'phpFTW\\controllers\\'.$controllerName;
			$controllerClass = new $controllerName($this);
			
			if(method_exists($controllerClass, $method)){
				$controllerClass->$method();
			}
			else{
				$this->logger->log->error("Unable to find method ".$method." in class ".$controllerName);
				$this->fof();
			}
			
		}else{
			$this->logger->log->error("Unable to find controller file ".$controllerFile);
			$this->fof();
		}
	}
	
	private function fof(){
		require_once(DOCROOT.$this->config->fof.".php");
	}
	
	private function getBeforeSlash($fullPath){
		
		preg_match("/.*\\".DIRECTORY_SEPARATOR."/", $fullPath, $controllerSearch);
		
		$controller = $fullPath;
		if($controllerSearch){
			$controller = rtrim($controllerSearch[0], DIRECTORY_SEPARATOR);
		}
		
		return $controller;
	}
	
	private function getAfterSlash($fullPath){
		
		preg_match("/(\\".DIRECTORY_SEPARATOR."[^\\".DIRECTORY_SEPARATOR."]*$)/", $fullPath, $methodSearch);
		
		$method = "";	
		if($methodSearch){
			$method = ltrim($methodSearch[0], DIRECTORY_SEPARATOR);
		}
		
		return $method;
	}
	
	function getRequestPath($givenPath){	
			
		$path = $givenPath;
		
		if(isset($this->config) && array_key_exists($givenPath, $this->config->paths)){
			$path = $this->config->paths[$givenPath];
		}
		
		$file = empty($path) ? "index" : $path;
		$file = $file;
		
		$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
		$file = str_replace('/', DIRECTORY_SEPARATOR, $file);
		
		$file = rtrim($file, DIRECTORY_SEPARATOR);
	
		return $file;
	}
	
	function loadTemplate($name, $dataIn){
		
		extract(array("data" => $dataIn));
		
		$file = DOCROOT."views/templates/".$name.".php";
		
		$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
		$file = str_replace('/', DIRECTORY_SEPARATOR, $file);
	
		if(file_exists($file)){
			require_once($file);
			return;
		}
		
		$this->logger->log->error("Unable to load template ".$file);
		$this->fof();
	}
	
	function loadView($body, $dataIn = [], $header = "header", $footer = "footer"){	
		
		extract(array("data" => $dataIn));
		
		$file = DOCROOT."views/".$body.".php";
		
		$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
		$file = str_replace('/', DIRECTORY_SEPARATOR, $file);
	
		if(file_exists($file)){
			$this->loadTemplate($header, $dataIn);
			require_once($file);
			$this->loadTemplate($footer, $dataIn);
			return;
		}
		
		$this->logger->log->error("Unable to load view ".$file);
		$this->fof();
	}
}