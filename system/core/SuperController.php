<?php

/**
* 	Framework's Main controller
*	Every controller should extend to this one to load views/models/libraries/helpers explicitly
*	This alose instantiate session class
*/
Class SuperController {

	function __construct () {
		//for loading a view/s models
		require_once( 'system/core/Load.php' ); 
		$this->load = new Load();
			
		//instantiate session class	
		$this->session = new Session();
	}

}