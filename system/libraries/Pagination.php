<?php

/**
*	This paginates the page
*@author Jairoh Tuada
*/
Class Pagination {

	var $base_url; //holds the base url 
	var $total_rows; //total number of rows found
	var $per_page; //number of rows per page
	var $num_links; //number of links to be shown
	var $offset; //starting page offset
	var $max_num_links; //supposed maximum number of links to be shown; ceil( total_rows * per_page )
	var $current_page; //holds the current page number
	var $output;

	var $lt = "&lt;";
	var $gt = "&gt";


	function __construct () {}


	/**
	* This initializes the pagination w/ the configurations
	*@param 	array = array of configurations
	*@author Jairoh Tuada
	*/

	function initialize ( $config = array() ) {
		if ( ! count( $config ) ) die( 'Pls specify a configuration for pagination.' );

		try {
			$this->base_url = $config [ 'base_url' ];
			$this->total_rows = $config [ 'total_rows' ];
			$this->per_page = $config [ 'per_page' ];
			$this->num_links = $config [ 'num_links' ];
			$this->offset = $config [ 'offset' ];
			$this->max_num_links = ceil( $this->total_rows / $this->per_page );
		} catch ( Exception $e ) {
			die( "Error: " . $e->getMessage() );
		}
	}

	/**
	* This will return an output link for a user to navigate (1.2.3.4.>.last)
	*@return 	output = string output of links
	*@author Jairoh Tuada
	*/

	function create_links () {
		//return empty string if there is no need to navigate
		if ( $this->per_page >= $this->total_rows ) return '';

		//set the current page value
		$this->current_page =  ceil ( $this->offset / $this->per_page ) + 1;

		
		$this->max_num_links;

		if ( $this->current_page == 1 ) 
			$x = $this->current_page; //start at the first page
		else if ( 1 < $this->current_page && $this->current_page < $this->max_num_links ) {
			$x = $this->current_page - ceil( $this->num_links / 2 ); //start before the current page
			$x = ( $x < 1 )? 1 : $x;
		}
		else $x = $this->max_num_links -  $this->num_links;


		//append prev values
		if ( $this->current_page - $this->num_links > 1 )
			$this->output .= "<a href='" . $this->base_url . 0 . "'>first</a> &nbsp;";
		if ( 1 < $this->current_page )
			$this->output .= "<a href='" . $this->base_url . ( $this->per_page * ( $this->current_page - 2 ) ) . "'>" . $this->lt . "</a> &nbsp;";


		//loop through and page links 1,2,3,4,5,6	
		for ( $x; ( $x < ( $this->current_page + $this->num_links ) && $x <= $this->max_num_links ); $x++ ) {
			$attr = ( $x == $this->current_page )?  
			"class='active' style='text-decoration:none; color: #000; font-weight:bold;'" : "";  
			
			$this->output .= "<a href='" . $this->base_url . ( $this->per_page * ( $x - 1 ) ) . "' $attr >" . ( $x ) . "</a> &nbsp;";
		}
		
		//append next values
		if ( $this->current_page < $this->max_num_links ) 
			$this->output .= "<a href='" . $this->base_url . ( $this->per_page * ( $this->current_page )  ) . "'>" . $this->gt . "</a> &nbsp;";
		if ( $this->current_page < $this->max_num_links && $this->current_page < $this->max_num_links -  1 )
			$this->output .= "<a href='" . $this->base_url . ( $this->per_page * ( $this->max_num_links - 1 ) ) . "' $attr >last</a> &nbsp;";
		

		return $this->output;
		

	}


}