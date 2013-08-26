<?php

Class User_model extends BaseModel {

	function __construct () {
		parent:: __construct();
	}


	function do_add_user ( $email, $password, $firstname, $lastname, $address ) {
		$this->db->execute( "INSERT INTO `account` VALUES( NULL, ?, SHA2( ?, 224 ), ?, ?, ?, 1, 1 );", 
			array( $email, $password, $firstname, $lastname, $address ) );
	}


}