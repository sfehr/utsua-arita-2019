/**
 * File utsua-home-init.js.
 *
 * LAYOUT ALGORITHM: 
 * IMAGE SLIDER: jQuery image slider used in home page. 
 * COLLAPSE BUTTON: Collection entries to collaspe when the button is clicked 
 * EVENT NOTE: Change display state after animation has completed
 *
 */


// LAYOUT ALGORITHM
jQuery(document).ready(function ( $ ) {
	
	// INITIALIZE
	$( '.slider-container' ).each(function( index ) {
		
		var slides = $( this ).find( '.slide-entry' );
		
		slides.each(function( index ) {
			
			var random = Math.floor( ( Math.random() * 2 ) + 1 ); //50% possibility
			
			//add the css class 'slide-small' when the random number is 2 and the previous element is not small
			if( random === 2 && !( $( this ).prev().hasClass( 'slide-small' ) ) ){
				
				random = Math.floor( ( Math.random() * 3 ) + 1 ); //33.33% possibility
				
				//make slide entry small
				$( this ).addClass( 'slide-small' );
				
				//center layout
				if( random === 2){ $( this ).addClass( 'center' ); }
				
				//bottom layout
				if( random === 3){ $( this ).addClass( 'bottom' ); }				
			}
			
		});
	});

});	


// IMAGE SLIDER
jQuery(document).ready(function( $ ) {
	
	var slideIndex = 1;
	var slider = [];
	var nSlides = 2; // get that value independent

	// INITIALIZE
	$( '.slider-container' ).each(function( index ) {

	  var slides = $( this ).find( '.slide-entry' );

	  slider[ index ] = new Slider( slides );

	  //set first n slides active
	  slides.each(function( index, element ) {
		if(index < nSlides){
		  $( element ).addClass( 'slide-active' );
		}
		else{
		  return false;
		}
	  });

	  // add next prev button
	  $( this ).append( slider[ index ].nextButton );
	  $( this ).append( slider[ index ].prevButton );

	  // add event listeners for the slider navigation
	  $( this ).on( 'click', '.slide-button.next', function() {
		var obj = $( this ).parents( '.slider-container' );
		changeSlide( obj, 'next' ); 
	  });

	  $( this ).on( 'click', '.slide-button.prev', function() {
		var obj = $( this ).parents( '.slider-container' );
		changeSlide( obj, 'prev' ); 
	  });  

	});


	// SLIDER OBJECT COSTRUCTOR
	function Slider( slides ) {
	  this.length = slides.length;
	  this.nextButton = '<a class="slide-button next"></a>';
	  this.prevButton = '<a class="slide-button prev"></a>';
	}


	// NAVIGATE THROUGH SLIDES
	function changeSlide( object, direction ){

	//  var currentSlide = $( '.slide-active' ); //first of two only  
	  var currentSlideStart = object.find( '.slide-active' ).first(); //first of two only
	  var currentSlideEnd = object.find( '.slide-active' ).last(); //first of two only
	  var nextSlide = currentSlideEnd.next( '.slide-entry' ); //2nd next
	  var prevSlide = currentSlideStart.prev( '.slide-entry' ); //2nd prev

	  // NEXT
	  if( direction == 'next' ){

		if( nextSlide.length ){
		  nextSlide.addClass( 'slide-active' );
		  currentSlideStart.removeClass( 'slide-active' );
		}
		else{
	//      object.find( '.slide-entry' ).first().addClass( 'slide-active' );
		}
	  }
	  // PREV
	  else{
		if( prevSlide.length ){
		  prevSlide.addClass( 'slide-active' );
		  currentSlideEnd.removeClass( 'slide-active' );
		}
		else{
	//      object.find( '.slide-entry' ).last().addClass( 'slide-active' );
		}    
	  }

	  // REMOVE CURRENT
	//  currentSlide.removeClass( 'slide-active' );
	  if( direction == 'next' ){
	//    currentSlideStart.removeClass( 'slide-active' );
	  }
	  else{
	//    currentSlideEnd.removeClass( 'slide-active' );
	  }
	}	

} );


// COLLAPSE BUTTON
jQuery(document).ready(function ( $ ) {
	
	//BUTTON MARKUP
	var collapse_button = '<a id="button-collapse" href="#">+ / –</a>';
	
	//ADD BUTTON	
	$( '#primary-menu' ).append( collapse_button );
	
	//BUTTON FUNCTIONALITY	
	$( 'body' ).on( 'click', '#button-collapse', function(ele) {
		
		console.log('button clicked');
		
		ele.preventDefault();
		
		// announce the collapsed state in the .site-content class
		$( 'body .site-content' ).toggleClass( 'state-collapsed' );
		
		// make slider container invisible
		$( 'body .slider-container' ).toggleClass( 'collapsed' );
		
		// make representive image visible
		$( 'body .image-collapsed' ).toggleClass( 'slide-active' );
	});
	
});


// EVENT NOTE
jQuery(document).ready(function ( $ ) {
	
	$( '.events' ).bind('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function(e) { 
		$(this).css( 'display', 'none' ); 
	});
	
});
