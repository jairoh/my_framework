<?php

/**
*	This class receives and return http requests
*@author 	Jairoh Tuada
*/

Class Input {

	/**
	*----------------------------------------------------------------------------------
	* function post
	*---------------------------------------------------------------------------------- 
	* This will return the post input
	*@param 	name = element name
	*@return 	post input
	*@author 	Jairoh Tuada
	*/

	function post ( $name, $xss_clean = false ) {
		return ( $xss_clean )? $_POST [ $name ] : htmlentities( $_POST [ $name ] );
	}

	
	/**
	*----------------------------------------------------------------------------------
	* function get
	*---------------------------------------------------------------------------------- 
	* This will return the get input
	*@param 	name = element name
	*@return 	get input
	*@author 	Jairoh Tuada
	*/

	function get ( $name, $xss_clean = false ) {
		return ( $xss_clean )? $_GET [ $name ] : htmlentities( $_GET [ $name ] );
	}

}