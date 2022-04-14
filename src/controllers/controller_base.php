<?php
	
	namespace phpFTW\controllers;

	class controller_base{
	
		public $loader;
		public $dbi;
		public $logger;
	
		function __construct($loader){
			$this->loader = $loader;
			$this->dbi = $loader->dbi;
			$this->logger = $loader->logger;
		}
		
		
	}