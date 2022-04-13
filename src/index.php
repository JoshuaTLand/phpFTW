<?php

	/*#################
		Envirionment
	##################*/
	//you must define the environment or there will be failures 
		
	if(getenv("ENVIRONMENT")){
		define("ENV", getenv("ENVIRONMENT"));
	}else{
		define("ENV", "default");
	}
	
	
	// Run setup
	require_once("system/init.php");
	
	// Prepare request
	$request = strtok($_SERVER["REQUEST_URI"], '?');
	$request = ltrim($request, '/');
	$request = rtrim($request, '/');

	// Load requested resource
	$loader->loadPath($request);
	
	$logger->log->debug("Finished loading request for ".$_SERVER["REQUEST_URI"]);