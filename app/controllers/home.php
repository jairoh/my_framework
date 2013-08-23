<?php

/**
*	Home Controller/ Default Controller
*/
Class Home extends BaseController {

	//var to be used as object model
	var $home_model;

	var $pagination;


	/**
	*	Constructor
	*/
	function __construct () {
		parent:: __construct();

		//load the model
		$this->home_model = $this->load->model( 'home_model' );

		if ( !$this->session->get( 'email' ) ) header( 'Location: ' . BASE_URL . "login" );
	}

	/*
	*	Default function
	*/
	function index () {
		echo 'home@index';

		print_r( $this->session->all() );
	}

	/*
	*	
	*/
	function display ( $id = null, $name = null, $offset = 0 ) {



		$this->pagination = $this->load->library( 'Pagination' );
		$config = array(
			'base_url' => BASE_URL . "home/display/$id/$name/",
			'total_rows' => 150,
			'per_page' => 8,
			'num_links' => 3,
			'offset' => abs( intval ( $offset ) )
		);
		$this->pagination->initialize( $config );

		echo $this->pagination->create_links() . '<br />';


		$data [ 'page_title' ] = 'Home View title';
		$data [ 'page_content' ] = 'home_view'; 

		$data [ 'user' ] = array( 'jairoh', 'tuada' );
		$this->load->view( 'template/page_content', $data );

	}


	function logout () {
		$this->session->destroy();
		header( 'Location: ' . BASE_URL . "login" );
	}
}