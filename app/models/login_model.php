<?php

Class Login_model extends BaseModel {

	function __construct () {
		parent:: __construct();
	}


	function get_user ( $email, $password ) {
		
		return $this->db->fetch( 'SELECT `id`, `firstname`  
			FROM `account` WHERE `email` = ? AND `password` = SHA2( ?, 224 );', 
			array( $email, $password ) );

	}

	
}