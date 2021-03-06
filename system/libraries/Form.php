<?php
/**
*	This creates form elements
*@author 	Jairoh Tuada
*/
Class Form {	

	/**
	*----------------------------------------------------------------------------------
	* function open
	*---------------------------------------------------------------------------------- 
	* This will open the form
	*@param 	action = action path
	*@param 	attributes = attributes
	*@param 	method = POST/GET, default is POST
	*@return 	<form .* >
	*@author 	Jairoh Tuada
	*/
	function open ( $action = BASE_URL, $attributes = '' , $method = 'POST' ) {
		echo "<form $attributes action='$action' accept-charset='utf-8' method='$method' >";
	}

	/**
	*----------------------------------------------------------------------------------
	* function open_multipart
	*---------------------------------------------------------------------------------- 
	* This will open the form multipart
	*@param 	action = action path
	*@param 	attributes = attributes
	*@param 	method = POST/GET, default is POST
	*@return 	<form .* multiplart >
	*@author 	Jairoh Tuada
	*/
	function open_multipart ( $action = BASE_URL, $attributes = '', $method = 'POST'  ) {
		echo "<form $attributes action='$action' accept-charset='utf-8' method='$method' enctype='multipart/form-data' >";
	}


	/**
	*----------------------------------------------------------------------------------
	* function close
	*---------------------------------------------------------------------------------- 
	* This will close the form
	*@return 	</form>
	*@author 	Jairoh Tuada
	*/
	
	function close() {
		echo "</form>";
	}

	/**
	*----------------------------------------------------------------------------------
	* function label
	*---------------------------------------------------------------------------------- 
	* This will create a label
	*@param 	for = for
	*@param 	attr = attributes
	*@return 	label
	*@author 	Jairoh Tuada
	*/

	function label ( $for = '', $value = '', $attributes = '' ) {
		echo "<label for='$for' $attributes >$value</label>";
	}
	
	/**
	*----------------------------------------------------------------------------------
	* function text
	*---------------------------------------------------------------------------------- 
	* This will create an input text
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	text input
	*@author 	Jairoh Tuada
	*/

	function text ( $name = 'text', $value = '', $attributes = '' ) {
		echo "<input type='text' name='$name' value='$value' $attributes />";
	}

	/**
	*----------------------------------------------------------------------------------
	* function email
	*---------------------------------------------------------------------------------- 
	* This will create an input email
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	email input
	*@author 	Jairoh Tuada
	*/

	function email ( $name = 'email', $value = '', $attributes = '' ) {
		echo "<input type='email' name='$name' value='$value' $attributes />";
	}

	/**
	*----------------------------------------------------------------------------------
	* function password
	*---------------------------------------------------------------------------------- 
	* This will create an input password
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	password input
	*@author 	Jairoh Tuada
	*/

	function password ( $name = 'password' , $attributes = '' ) {
		echo "<input type='password' name='$name' $attributes />";
	}

	/**
	*----------------------------------------------------------------------------------
	* function submit
	*---------------------------------------------------------------------------------- 
	* This will create submit button
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	submit button
	*@author 	Jairoh Tuada
	*/

	function submit ( $name = 'submit', $value = 'Submit', $attributes = '' ) {
		echo "<input type='submit' name='$name' value='$value' $attributes  />";
	}


	/**
	*----------------------------------------------------------------------------------
	* function button
	*---------------------------------------------------------------------------------- 
	* This will create button
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	button
	*@author 	Jairoh Tuada
	*/

	function button ( $name = 'button', $value = 'Button', $attributes = '' ) {
		echo "<input type='button' name='$name' value='$value' $attributes  />";
	}

	/**
	*----------------------------------------------------------------------------------
	* function hidden
	*---------------------------------------------------------------------------------- 
	* This will a input hidden
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	input hidden
	*@author 	Jairoh Tuada
	*/

	function hidden ( $name = 'hidden', $value = '', $attributes = '' ) {
		echo "<input type='hidden' name='$name' value='$value' $attributes  />";
	}

	/**
	*----------------------------------------------------------------------------------
	* function textarea
	*---------------------------------------------------------------------------------- 
	* This will a textarea
	*@param 	name = name
	*@param 	attr = attributes
	*@return 	button
	*@author 	Jairoh Tuada
	*/

	function textarea ( $name = 'textarea', $value = '', $attributes = '' ) {
		echo "<textarea name='$name' $attributes >$value</textarea>";
	}

	/**
	*----------------------------------------------------------------------------------
	* function select
	*---------------------------------------------------------------------------------- 
	* This will a select
	*@param 	name = name
	*@param 	options = options
	*@param 	attr = attributes
	*@return 	select
	*@author 	Jairoh Tuada
	*/

	function select ( $name = 'select', $options = array(), $selected = null, $attributes = '' ) {
		$output = "<select name='$name' $attributes >";


		/*
		| Loop through the options specified
		| array (
		|	   'value' => 'key'	
		|	) equals <option value='$value' >$key</option>	
		*/
		foreach ( $options as $value => $key ) {
			
			$selection = ( $value == $selected )? "selected='selected'" : '';

			$output .= "<option value='$value' $selection  >$key</option>";
		} 

		$output .= "</select>";

		echo $output;
	}


	/**
	*----------------------------------------------------------------------------------
	* function set_value
	*---------------------------------------------------------------------------------- 
	* This will a return the value of a form element requested or it's default
	*@param 	name = form element name
	*@param 	default_value = default value of the element
	*@return 	post requested value of the form element or the default value
	*@author 	Jairoh Tuada
	*/

	function set_value ( $name, $default_value ) {
		return ( isset ( $_POST [ $name ] ) )? htmlentities( $_POST [ $name ] ) : $default_value;
	}


}	