<?php

/**
*	This class loads the views/models/libraries/helpers when invoked
*/
Class Load {


	function __construct () {

		/*
		| Instantiate the load variable as this class for the required views/models/libraries/helpers
		| can explicitly call ( $this->load->view or model ) than just ( $this->view / model )
		*/
		$this->load = $this;
	}


	/**
	*----------------------------------------------------------------------------------
	* function view
	*---------------------------------------------------------------------------------- 
	* This will load the view and pass variables if there are, to be used
	*@param view_name = name of the model
	*@param $data = array passed to be used in the view after extraction
	*@author Jairoh Tuada
	*/
	
	public function view ( $view_name, $data = null ) {
		if ( ! file_exists( APPATH . "views/$view_name.php" ) ) die( "Unable to load view [app/views/$view_name.php]. Page not found[404]." );
		else {
			if ( $data ) extract( $data ); //extract array into variables
			require_once( "app/views/$view_name.php" ); 
		}
	}



	
	/**
	*----------------------------------------------------------------------------------
	* function model
	*---------------------------------------------------------------------------------- 
	* This will load the model and return the model object instantiated
	*@param model_name = name of the model
	*@return object model instantiated
	*@author Jairoh Tuada
	*/

	function model ( $model_name ) {
		if ( ! file_exists( APPATH . "models/$model_name.php" ) ) die( "Unable to load model [app/models/$model_name.php]. Page not found[404]." );
		else { 
			require_once( APPATH . "models/$model_name.php" ); 
			return new $model_name;
		}
	}


	/**
	*----------------------------------------------------------------------------------
	* function library
	*---------------------------------------------------------------------------------- 
	* This will load the library and return the library object instantiated
	*@param library_name = name of the libray
	*@return object library instantiated
	*@author Jairoh Tuada
	*/

	function library ( $library_name ) {
		if ( ! file_exists( "system/libraries/$library_name.php" ) ) die( "Unable to load model [system/libraries/$library_name.php]. Page not found[404]." );
		else { 
			require_once( "system/libraries/$library_name.php" ); 
			return new $library_name;
		}
	}

}