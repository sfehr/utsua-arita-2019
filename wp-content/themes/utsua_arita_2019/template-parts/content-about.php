<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package utsua_arita_2019
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php // the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		
		// CUSTOM FIELDS: About Text EN (metabox, field, css-class)
		ut_get_pages_data( 'ut_pages_text_', 'text_en', 'about-entry' );

		// CUSTOM FIELDS: About Text JP
		ut_get_pages_data( 'ut_pages_text_', 'text_jp', 'about-entry' );

		// IMAGE
		utsua_arita_2019_post_thumbnail(); 

		// CUSTOM FIELDS: Credits EN
		ut_get_pages_data( 'ut_aobut_', 'credits_en', 'credit-entry' );
		
		// CUSTOM FIELDS: Credits JP
		ut_get_pages_data( 'ut_about_', 'credits_jp', 'credit-entry' );		
		
		
//		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'utsua_arita_2019' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'utsua_arita_2019' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
