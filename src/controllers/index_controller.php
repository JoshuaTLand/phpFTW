<?php
namespace phpFTW\controllers;

class index_controller extends controller_base{

	
	function __construct($loader){
		parent::__construct($loader);
	
	}
	
	function index(){

		$sampleMessage = "Thanks for trying phpFTW v 1.0.0";
		$this->loader->loadView("index", array("sampleMessage" => $sampleMessage));
		
	}
}