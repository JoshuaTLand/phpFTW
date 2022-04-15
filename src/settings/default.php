<?php

	$settings = [
		
		/*=============================================
		#  Database
		===============================================
		Settings to be used for database connection
		
		Available DB drivers:
			mysql
			pgsql
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		"db" => [
			"host" => "",   // <-- No database connection will be attempted if host is empty
			"dbName" => "",
			"user" => "",
			"password" => "",
			"port" => "",
			"driver" => ""
		],
		
		
		/*=============================================
	    #  Paths
		===============================================
		Requested paths are assumed to point to
		a controller unless overridden here.
		
		[ "requestedPath" => "redirectPath" ]
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		"paths" => [
		
		],
		
		
		/*===========================================
		#  404
		=============================================
		The view name to be loaded when
		a view cannot be found
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		"404file" => "404",
		
		
		/*=============================================
		#  Log Levels
		===============================================
		Log levels listed below in acending order
		  
		Log entries of the set level and below will
		be recorded
		
		none
		error
		warning
		debug 
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		"logLevel" => "debug",
		
		
		/*=============================================
		#  Error Levels
		===============================================
		-1 -> Shows all errors
		0  -> Shows no errors
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		"errorLevel" => E_ALL
		
	];