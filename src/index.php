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
	
	// SETUP THE ENVIRONMENT
	date_default_timezone_set("America/New_York");

	$docRoot = str_replace('\\', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']);
	$docRoot = str_replace('/', DIRECTORY_SEPARATOR, $docRoot);
	$docRoot = rtrim($docRoot, DIRECTORY_SEPARATOR);
	define("DOCROOT", $docRoot.DIRECTORY_SEPARATOR);

	require '../vendor/autoload.php';
	
	$phpFTW = new phpFTW\system\engine();	
	$phpFTW->run($_SERVER["REQUEST_URI"]);