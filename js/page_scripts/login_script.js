/*$( document ).ready( function () {
	

	$( '#login_form' ).submit( function () {

		var data = $( this ).serialize() + '&login=' + $( '[name="login"]' ).val();

		//console.log( data );

		$.post( $( this ).attr( 'action' ), data, function ( e ) {
			alert( e );
		} );

		return false;
	} );

} );*/