/**
 * @package Academica
 */
( function( $ ) {
	$( document ).ready( function() {
		$( "#menuhead ul" ).css( { display : "none" } ); // Opera Fix
		$( "#menuhead li" ).hover( function() {
			$( this ).find( 'ul:first' ).css( { visibility : "visible", display : "none" } ).show( 268 );
		}, function() {
			$( this ).find( 'ul:first' ).css( { visibility : "hidden" } );
		} );
	} );
} )( jQuery );