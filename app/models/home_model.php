<?php

Class Home_model extends BaseModel {

	function __construct () {
		parent:: __construct();
	}

	function get_items () {
		$this->db->query( "SELECT * FROM `item`;" );
	}
}