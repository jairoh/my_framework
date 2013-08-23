<?php

/**
* 	Framework's Main Model
*	Every model should extend to this one to load views/models/libraries/helpers explicitly
*	This class also loads and instantiate the system/core/Database.php class		
*/
Class SuperModel {
	
	function __construct () {
			
		//for querying 
		require( 'system/core/Database.php' );
		$this->db = new Database();
	}

}