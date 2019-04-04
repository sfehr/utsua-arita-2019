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
	
	<div class="collection-info">
		<?php
		// CUSTOM FIELD: Collections Images (file_list) > Slider Container
		ut_get_file_list( 'ut_collections_file_list' );
		?>
	</div>	

	<div class="entry-content">
		<div class="collection-info">
			<?php

			// CUSTOM FIELD: Collections INFO Bundle
			ut_get_collection_data( 'collection' );


			// IMAGE (representive image when entry images are collapsed)
			the_post_thumbnail( 'full', array( 'class' => 'image-collapsed') );

			?>
		</div><!-- .collection-info -->			
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php utsua_arita_2019_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
