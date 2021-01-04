<?php

// SETUP THE ENVIRONMENT
date_default_timezone_set("America/New_York");

$docRoot = str_replace('\\', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']);
$docRoot = str_replace('/', DIRECTORY_SEPARATOR, $docRoot);
$docRoot = rtrim($docRoot, DIRECTORY_SEPARATOR);
define("DOCROOT", $docRoot.DIRECTORY_SEPARATOR);


// SETUP THE AUTOLOADER
spl_autoload_register(function ($class) {
	$file = str_replace("\\", DIRECTORY_SEPARATOR, $class).'.php';
	$file = str_replace("/", DIRECTORY_SEPARATOR, $file);
	$file = DOCROOT.$file;
	
	if (file_exists($file)) {
		require_once($file);
		return true;
	}
	return false;
});


// SETUP THE SYSTEM OBJECTS
require_once("system".DIRECTORY_SEPARATOR."logger.php");
$logger = new logger();

$config = new system\config();
$dbi = new system\dbi();	
$loader = new system\loader();

$logger->setLogLevel($config->logLevel);
error_reporting($config->errorLevel);


// START THE SESSION AND DEFINE LOGGEDIN
session_start();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	define("LOGGEDIN", true);
}else{
	define("LOGGEDIN", false);
}


