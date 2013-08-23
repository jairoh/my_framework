<?php


	/*
	|----------------------------------------------------------------------------------
	| Load and instantiate the system/core/config class
	|---------------------------------------------------------------------------------- 
	| This classloads every necessary things like 
	| (app/configurations files), (system/core/SuperController and Model),
	| (app/bases/BaseController and Model that extends system/core/SuperController and Model) if there is
	| (app/controllers or the default controller )	
	*/
	
	require_once( 'system/core/config.php' );
	$config = new Config();


