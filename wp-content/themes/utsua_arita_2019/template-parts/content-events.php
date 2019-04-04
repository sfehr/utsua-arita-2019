<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package utsua_arita_2019
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
	
	// shows only the title in the home page
	if( is_home() ){
		
//		the_title( '<h1 class="entry-title">', '</h1>' );
		the_title( '<h1 class="entry-title"><a href="' . esc_url( home_url( 'events' ) ) . '" rel="bookmark">', '</a></h1>' );
		
	}
	
	else{
		
		?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
	//			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;


			// CUSTOM FIELD: Event Date (field, css-class)
			ut_get_events_data( 'date', 'event' );


			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					utsua_arita_2019_posted_on();
					utsua_arita_2019_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		
	
		<div class="entry-image">
		<?php
			// EVENT IMAGE
			the_post_thumbnail(); // utsua_arita_2019_post_thumbnail(); 
		?>
		</div>

		<div class="entry-content">
			<?php

			// CUSTOM FIELD: Event Text EN (field, css-class)
			ut_get_events_data( 'text_en', 'event' );

			// CUSTOM FIELD: Event Text JP (field, css-class)
			ut_get_events_data( 'text_jp', 'event' );		


			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'utsua_arita_2019' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'utsua_arita_2019' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php utsua_arita_2019_entry_footer(); ?>
		</footer><!-- .entry-footer -->		
	
	<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
