<?php 
namespace System\Core;

/*
|----------------------------------------------------------------------------------
| core's Config file
|---------------------------------------------------------------------------------- 
| This class loads every necessary things like 
| (app/configurations files), (system/core/SuperController and Model),
| (app/bases/BaseController and Model that extends system/core/SuperController and Model) if there is
| (app/controllers or the default controller )	
*/

Class Config {

	//holds an array of autoloaded libraries and helpers
	var $autoload = array();

	/*
	|----------------------------------------------------------------------------------
	| Constructor
	|---------------------------------------------------------------------------------- 
	| Loads the configurations
	| Loads the SuperController/Model
	| Loads the BaseControllers/Models if there is
	*/

	function __construct () {
		$this->load_configurations();
		$this->set_error_reporting();
		$this->load_supers();
		$this->load_bases();
		$this->load_controller();

	}
	
	/*
	|----------------------------------------------------------------------------------
	| function load_configuration
	|---------------------------------------------------------------------------------- 
	| Loads the app/configurations files like config.php, autload.php(w/ the specified helpers/libraries)
	*/

	function load_configurations () {
		$files = glob( "app/configurations/*.php" ); //all php files
		foreach ( $files as $file ) { 
				
			//do not load database.php	
			$arr = explode( '/', $file );
			if ( !preg_match( '/database/', $arr [ 2 ] ) ) {
				require_once( $file );

				//autoload the specified helpers/libraries
				if ( preg_match( '/autoload/' , $arr [ 2 ] ) ) 
					foreach ( $autoload [ 'libraries' ] as $library ) 
						require( "system/libraries/$library.php" );	
			}

		}

	}

	/*
	|----------------------------------------------------------------------------------
	| function set_error_reporting
	|---------------------------------------------------------------------------------- 
	| Shows php error if the defined DISPLAY_ERROS in app/configurations/config file = true
	| This function should be called after loading the app/configurations file 
	| or load_configurations function
	*/

	function set_error_reporting () {
		if ( DISPLAY_ERRORS ) ini_set('display_errors', 'on');
		else ini_set('display_errors', 'off');
	}
	
	/*
	|----------------------------------------------------------------------------------
	| function load_supers
	|---------------------------------------------------------------------------------- 
	| Loads the system/core/SuperController or Model class which 
	| All controllers or models should extend to these classes or 
	| these classes child controller or model which are in the app/bases
	*/

	function load_supers() {
		$files = glob( "system/core/Super*.php" );
		foreach ( $files as $file ) require_once( $file ); 
	}
	
	/*
	|----------------------------------------------------------------------------------
	| function load_bases
	|---------------------------------------------------------------------------------- 
	| Loads the app/bases/BaseController or Model for the controllers/models to extend to
	*/

	function load_bases () {
		$files = glob( "app/bases/Base*.php" );
		foreach ( $files as $file ) require_once( $file );
	}

	/*
	|----------------------------------------------------------------------------------
	| function load_controller
	|---------------------------------------------------------------------------------- 
	| Loads and instantiate the controller passed
	| If there is no controller passed, use the default controller defined from the 
	| app/configurations/config.php and call the indexfunction. But if there is a controller,
	| then load its index function or the controller function specified
	*/

	function load_controller () {

		/*
		|	Receives the url passed (base_url/controller_name/controller_function/parameters*...)
		| 	and put it in an array
		*/
		
		$uri = isset( $_GET [ 'url' ] )? explode( '/' , rtrim( $_GET [ 'url' ], '/' ) ) : array();

		/*
		| 	Check if there are parameters passed,
		| 	if true, load controllername/controller_function/param1?/param2?.....
		| 	if false, load the default controller defined from the app/configurations/config.php. 
		|	And if there is no specified controller function, set the index function as default controller function value.
		|	Then load and instantiate the controller and call the controller method
		*/

		if ( count( $uri ) ) {
			$controller_name = $uri [ 0 ];
			$controller_function = ( count( $uri ) > 1 )? $uri [ 1 ]: 'index';
		} else { 
			$controller_name = DEFAULT_CONTROLLER;
			$controller_function = 'index';
		}
		if ( ! file_exists( "app/controllers/$controller_name.php" ) ) die( "Page not found.[404]" );
		require_once( "app/controllers/$controller_name.php" );
		$controller = new $controller_name();
		

		/*
		|	Check if the controller function passed exists,
		|	else die
		*/
		if ( ! method_exists( $controller, $controller_function ) ) die( 'Page not found[404].' );
		else {

			//check the number of parameters the function has, then call the function
			/*$classMethod = new ReflectionMethod( $controller,$controller_function );
			$number_arguments = count($classMethod->getParameters() );*/

			//allow only maximum of 4 parameters passed
			if ( count( $uri ) <= 2 ) $controller->{$controller_function}();
			else if ( count( $uri ) == 3 ) $controller->{$controller_function}( $uri [ 2 ] );
			else if ( count( $uri ) == 4 ) $controller->{$controller_function}( $uri [ 2 ], $uri [ 3 ] );
			else if ( count( $uri ) == 5 ) $controller->{$controller_function}( $uri [ 2 ], $uri [ 3 ], $uri [ 4 ] );
			else if ( count( $uri ) > 5 )$controller->{$controller_function}( $uri [ 2 ], $uri [ 3 ], $uri [ 4 ], $uri [ 5 ] );

		}
		
		
	}





}