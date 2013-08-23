<?php

/*
|----------------------------------------------------------------------------------
| Database class
|---------------------------------------------------------------------------------- 
| This class will aumatically instantiate and start a database connection
|
*/

Class Database extends PDO{

	
	function __construct () {
		
		//load database configurations & credentials
		require_once( APPATH . 'configurations/database.php' );

		
		//catch PDO errors
		try {
			

			//identify of what type of connection used
			if ( strtolower( trim( $database [ 'driver' ] ) ) == 'mysql' ) {
				
				//get the specified mysql configuration from app/configurations/database.php
				$host = $database [ 'connection' ] [ 'mysql' ] [ 'host' ];
				$database_name = $database [ 'connection' ] [ 'mysql' ] [ 'database_name' ];
				$database_username = $database [ 'connection' ] [ 'mysql' ] [ 'username' ];
				$database_password = $database [ 'connection' ] [ 'mysql' ] [ 'password' ];


				parent:: __construct( "mysql:host=$host;dbname=$database_name", $database_username, $database_password, 
					array( PDO::ATTR_PERSISTENT => true ) );

			}else die( "Please specify a database driver" );	

		
		} catch ( PDOException $e ) {
			die( "Error: " . $e->getMessage() );
		} //end catch PDO errors
	}



	/**
	*----------------------------------------------------------------------------------
	* function fetch
	*---------------------------------------------------------------------------------- 
	* This will fetch results from the database
	*@param 	view_name = name of the model
	*@param 	data = array passed for conditioning ?, ?, ?
	*@param 	return_by = string( 'single' or 'multiple' )
	*@return 	array = single/multiple result
	*@author 	Jairoh Tuada
	*/
	
	function fetch ( $sql, $param_conditions, $return_by = 'single' ) {
		$query = $this->prepare( $sql );
		$query->execute( $this->escape_array_params( $param_conditions ) );

		if ( strtolower( $return_by ) == 'multiple' ) return $query->fetchAll( PDO::FETCH_ASSOC );
		else return $query->fetch( PDO::FETCH_ASSOC );
	}




	/**
	*----------------------------------------------------------------------------------
	* function escape_array_params
	*---------------------------------------------------------------------------------- 
	* This will return an array w/ mysql real escaped value
	*@param 	$array = array to of the elements to be escaped
	*@return 	$escaped_array = array to of the elements escaped
	*@author 	Jairoh Tuada
	*/

	function escape_array_params ( $array ) {
		$escaped_aray = array();

		foreach ( $array as $val ) array_push( $escaped_aray, mysql_real_escape_string( $val ) );

		return $escaped_aray;
	}

		


}

