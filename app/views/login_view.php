<h1>Login</h1>

<?php
echo Form::open( BASE_URL . 'login/do_login' );
	echo Form::label( 'email', 'Email:' );
	echo "<br />";
	echo Form::text( 'email' );
	echo "<br />";

	echo Form::label( 'password', 'Password:' );
	echo "<br />";
	echo Form::password();

	echo Form::submit( 'login', 'Login' );
echo Form::close();

$options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );

echo Form::select( 'shirts', $options, 'med', 'class="optiones"' );