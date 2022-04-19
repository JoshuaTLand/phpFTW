<?php

namespace phpFTW\system;

class engine {
	
	private $config;
	private $logger;
	private $dbi;
	private $loader;

	function __construct(){
		$this->config = new config();
		$this->logger = new logger();
		$this->dbi = new dbi($this->config, $this->logger);
		$this->loader = new loader($this->config, $this->logger, $this->dbi);
	}

	function run($requestURI){
		$request = $this->prepareRequest($requestURI);
		$this->loader->loadPath($request);
	}

	private function prepareRequest($request){
		$request = strtok($request, '?');
		$request = ltrim($request, '/');
		$request = rtrim($request, '/');
		return $request;
	}

}