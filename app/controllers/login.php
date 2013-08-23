<?php

/**
*	Login Controller
*/
Class Login extends BaseController{

	var $login_model;

	/**
	*	Constructor
	*/
	function __construct () {
		parent:: __construct();

		//load login model
		$this->login_model = $this->load->model( 'login_model' );

		if ( $this->session->get( 'email' ) ) header( 'Location: ' . BASE_URL . "home" );

	}


	/*
	*	Default function
	*/
	function index () {
		$this->display();
	}


	function display () {
		$data [ 'page_title' ] = 'User Login'; 
		$data [ 'page_content' ] = 'login_view';

		$this->load->view( 'template/page_content', $data );

	}


	function do_login () {
			
		//make a helper of form inputs	

		if ( isset( $_POST [ 'login' ] ) ) {
			$email = trim ( $_POST [ 'email' ] );
			$password = trim ( $_POST [ 'password' ] );

			if ( $user = $this->login_model->get_user( $email, $password ) ) {
				$this->session->set( 'email', $email );
				$this->session->set( 'password', $password );

				header( 'Location: ' . BASE_URL . "home" );
			} else echo 'does not exists';

		} else die( 'Page not found' );
	}


}