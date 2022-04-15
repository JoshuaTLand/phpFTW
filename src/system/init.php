<?php

// SETUP THE ENVIRONMENT
date_default_timezone_set("America/New_York");

$docRoot = str_replace('\\', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']);
$docRoot = str_replace('/', DIRECTORY_SEPARATOR, $docRoot);
$docRoot = rtrim($docRoot, DIRECTORY_SEPARATOR);
define("DOCROOT", $docRoot.DIRECTORY_SEPARATOR);


require '../vendor/autoload.php';
$logger = new phpFTW\system\logger();

$config = new phpFTW\system\config();
$dbi = new phpFTW\system\dbi();	
$loader = new phpFTW\system\loader();

$logger->setLogLevel($config->logLevel);
error_reporting($config->errorLevel);


// START THE SESSION AND DEFINE LOGGEDIN
session_start();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	define("LOGGEDIN", true);
}else{
	define("LOGGEDIN", false);
}


