<?php

/**
*	Session Class
*@author Jairoh Tuada
*/
Class Session {

	/*
	* This constructor starts the session
	*/
	function __construct () {
		session_start(); 
	}


	/**
	* This returns the $_SESSION array
	*@return 	$_SESSION
	*@author 	Jairoh Tuada
	*/
	public static function all() {
		return $_SESSION;
	}


	/**
	* This sets as a variable session
	*@param 	key = session key
	*@param 	value = session value
	*@author   Jairoh Tuada 
	*/

	public static function set ( $key, $value ) {
		$_SESSION [ $key ] = $value;
	}


	/**
	* This returns a session value depeding on a key
	*@param 	key = session key
	*@return 	Session value
	*@author   Jairoh Tuada 
	*/

	public static function get ( $key ) {
		return ( isset ( $_SESSION [ $key ] ) )? $_SESSION [ $key ]: null;
	}


	/**
	* This removes a session data value
	*@param 	key = session key
	*@author 	Jairoh Tuada
	*/
	
	public static function remove ( $key ) {
		unset( $_SESSION [ $key ] );
	}

	/**
	* This destroys all the session
	*@param 	key = session key
	*@author 	Jairoh Tuada
	*/

	public static function destroy () {
		//unset( $_SESSION );
		session_destroy();
	}

	


}