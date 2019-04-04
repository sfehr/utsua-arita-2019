/**
 * File utsua-home-init.js.
 *
 * MAIN NAVIGATION: switch the displayed languages on hover
 *
 */


//MAIN NAVIGATION
jQuery(document).ready(function ( $ ) {
	
	$( '.menu-item a' ).each(function( index ) {
		var original = $( this ).text();
		var translation = $( this ).attr( 'data-lang' );	
		
		// switch languages on mouse over
		$( this ).on( 'mouseover',  function(e){
			$( this ).text(translation);
		});
		
		$( this ).on( 'mouseleave',  function(e){
			$( this ).text(original);
		});
	});
	
});
