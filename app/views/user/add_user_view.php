<?php 
	Form::open( BASE_URL . "user/do_add_user" );
		
		Form::label( 'email', 'Email:' ); echo "<br />";
		Form::email( 'email' ); echo "<br />";
		
		Form::label( 'password', 'Password:' ); echo "<br />";
		Form::password( 'password' ); echo "<br />";

		Form::label( 'firstname', 'Firstname:' ); echo "<br />";
		Form::text( 'firstname' ); echo "<br />";

		Form::label( 'lastname', 'Lastname:' ); echo "<br />";
		Form::text( 'lastname' ); echo "<br />";

		Form::label( 'address', 'Address:' ); echo "<br />";
		Form::text( 'address' ); echo "<br />";

		Form::submit( 'add_user', 'Save User' );

	Form::close(); 
?>

