/**
 * @package Academica
 */
( function( $ ) {
	$('#featured-slider, .gallery-slider').nivoSlider({
		effect:'sliceDown', //Specify sets like: 'fold,fade,sliceDown'
		pauseTime:5000,
		controlNav:false, //1,2,3...
	});
} )( jQuery );