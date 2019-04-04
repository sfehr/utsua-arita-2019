/**
 * File utsua-events-interaction.js.
 *
 * SHOW POST THUMBNAIL: displays the post featured image on mouseover
 *
 */


//MAIN NAVIGATION
jQuery(document).ready(function ( $ ) {
	
	$( 'article.events' ).each(function( index ) {
			
		// switch languages on mouse over
		$( this ).on( 'mouseover', '.entry-content, .entry-image img', function(e){
			console.log('hover')
			$( this ).parents( 'article' ).find( '.entry-image' ).css( 'display', 'flex' );
		});		
		
		$( this ).on( 'mouseout', '.entry-content, .entry-image img', function(e){
			$( this ).parents( 'article' ).find( '.entry-image' ).css( 'display', 'none' );
		});
	});
	
});
