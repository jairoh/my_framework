<?php


Class User extends BaseController {

	var $user_model;

	function __construct () {
		parent:: __construct();

		$this->user_model = $this->load->model( 'user_model' );
	}

	function index () {
		echo 'Hello';
	}

	function add_user () {
		$data [ 'page_title' ] = 'Add New User';
		$data [ 'page_content' ] = 'user/add_user_view';

		$this->load->view( 'template/page_content', $data );
	}


	function do_add_user () {

		$email = Input::post( 'email' );
		$password = Input::post( 'password' );
		$firstname = Input::post( 'firstname' );
		$lastname = Input::post( 'firstname' );
		$address = Input::post( 'firstname' );


		/*$this->user_model->do_add_user ( $email, $password, $firstname, $lastname, $address );
		echo 'done';*/
	}


}