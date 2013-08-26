<script type="text/javascript" src="<?= BASE_URL ?>js/page_scripts/login_script.js" ></script>

<h1>Login</h1>

<?php
Form::open( BASE_URL . 'login/do_login', 'id="login_form"' );
	Form::label( 'email', 'Email:' );
	echo "<br />";
	Form::text( 'email', Form::set_value( 'email', 'ambot@gmail.com' ) );
	echo "<br />";

	Form::label( 'password', 'Password:' );
	echo "<br />";
	Form::password( 'password' );

	Form::submit( 'login', 'Login' );
Form::close();

$options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );

Form::select( 'shirts', $options, 'med', 'class="optiones"' );