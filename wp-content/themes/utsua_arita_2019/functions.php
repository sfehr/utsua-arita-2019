<?php
/**
 * utsua_arita_2019 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package utsua_arita_2019
 */


/** UT Custom Functions Inventory:
 *  
 * Get Custom Field Values: Event Data Bundle
 * Get Custom Field Values: Collections Data
 * Get Custom Field Values: Collections Images (file_list)
 * Get Custom Field Values: Pages
 * Display Post Types in homepage
 * Add insert data-lang attribute to main navigation
 * Disable Editor in Pages
 *
 */



if ( ! function_exists( 'utsua_arita_2019_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function utsua_arita_2019_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on utsua_arita_2019, use a find and replace
		 * to change 'utsua_arita_2019' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'utsua_arita_2019', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'utsua_arita_2019' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'utsua_arita_2019_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'utsua_arita_2019_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function utsua_arita_2019_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'utsua_arita_2019_content_width', 640 );
}
add_action( 'after_setup_theme', 'utsua_arita_2019_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function utsua_arita_2019_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'utsua_arita_2019' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'utsua_arita_2019' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'utsua_arita_2019_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function utsua_arita_2019_scripts() {
	wp_enqueue_style( 'utsua_arita_2019-style', get_stylesheet_uri() );

	wp_enqueue_script( 'utsua_arita_2019-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'utsua_arita_2019-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	// SF: main navigation functionality
	wp_enqueue_script( 'utsua_arita_2019-nav-interaction', get_template_directory_uri() . '/js/utsua-nav-interaction.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// SF: load jquery home page functionality
	if ( is_home() ) {
		wp_enqueue_script( 'utsua_arita_2019-home-init', get_template_directory_uri() . '/js/utsua-home-init.js', array( 'jquery' ), '20151215', true );
	}
	
	// SF: load jquery event page functionality
	if ( is_post_type_archive( 'events' ) ) {
		wp_enqueue_script( 'utsua_arita_2019-events-interaction', get_template_directory_uri() . '/js/utsua-events-interaction.js', array( 'jquery' ), '20151215', true );
	}	
	
}
add_action( 'wp_enqueue_scripts', 'utsua_arita_2019_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/** SF:
 * Load CMB2 functions
 */
require_once( dirname(__FILE__) . '/inc/ut-cmb2-functions.php');


/** SF:
 * Get Custom Field Values: Event Data Bundle
 */
function ut_get_events_data( $field, $class ) {
	
	$prefix = 'ut_events_';
	$fields = array( 'date', 'text_en', 'text_jp' );
	
	// stops function when called field value is not matching with the fields array
	if ( ! in_array( $field, $fields ) ){
		return false;
	}
	
	// GET THE FIELD VALUES //
	
	$field_value = get_post_meta( get_the_ID(), $prefix . $field, true );
		
	// SWITCH CASE:
	switch ($field) {
			
		case 'date' :
			// checks if the field contains a value, converts value into a readable format, returns "–" if not
			$field_output = !( $field_value == '' ) ?  date( "d M Y", $field_value) : '';
			$field_title = 'date';
			break;
				
		case 'text_en' :
			// checks if the field contains a value, returns "–" if not
			$field_output = !( $field_value == '' ) ?  $field_value : '';
			$field_title = 'text_en';
			break;
				
		case 'text_jp' :
			// checks if the field contains a value, returns "–" if not
			$field_output = !( $field_value == '' ) ?  $field_value : '';
			$field_title = 'text_jp';
			break;				
				
		default:
			// code to be executed if n is different from all labels;
	}
		
		
	// CONSTRUCT MARKUP WITH VALUE //
	
	// checks weather a field value exist or not
	if ( !empty( $field_output ) ) {
		
		//add specific class to each entry
		$specific_class = !( $field_title == '' ) ? $class . '-' . $field_title : '';
		
		echo '<div class="' . esc_attr( $specific_class ) . '">';
		
		// FIELD TITLE: checks weather a field title exist or not
//		if ( !empty( $field_title ) ) { echo '<span class="data-title">' . esc_html( $field_title ) . '</span>'; }
		
		// FIELD DATA
		echo wpautop( esc_html( $field_output ) );
		
		echo '</div><!-- .' . esc_attr( $specific_class ) . ' -->';
						
	}			
	
}


/** SF:
 * Get Custom Field Values: Collections Data
 */
function ut_get_collection_data( $class ) {
	
	$prefix = 'ut_collections_';
	$fields = array( 'name_en', 'name_jp', 'dimensions', 'details_en', 'details_jp' );
	
	// GET THE FIELD VALUES //
	
	// loops through the fields stated in the array $fields
	foreach ( (array) $fields as $field) {
		$field_value = get_post_meta( get_the_ID(), $prefix . $field, true );
		
		// SWITCH CASE:
		switch ($field) {
				
			case 'name_en' :
				// checks if the field contains a value, returns "–" if not
				$field_output = !( $field_value == '' ) ?  $field_value : '-';
				$field_title = 'name_en';
				break;
				
			case 'name_jp' :
				// checks if the field contains a value, returns "–" if not
				$field_output = !( $field_value == '' ) ?  $field_value : '-';
				$field_title = 'name_jp';
				break;				
				
			case 'dimensions' :
				// checks if the field contains a value, returns "–" if not
				$field_output = !( $field_value == '' ) ?  $field_value : '-';
				$field_title = 'dimensions';
				break;
				
			case 'details_en' :
				// checks if the field contains a value, returns "–" if not
				$field_output = !( $field_value == '' ) ?  $field_value : '-';
				$field_title = 'details_en';
				break;
				
			case 'details_jp' :
				// checks if the field contains a value, returns "–" if not
				$field_output = !( $field_value == '' ) ?  $field_value : '-';
				$field_title = 'details_jp';
				break;				
				
			default:
				// code to be executed if n is different from all labels;
		}
		
		
		// CONSTRUCT MARKUP WITH VALUE //
	
		// checks weather a field value exist or not
		if ( !empty( $field_output ) ) {
		
			//add specific class to each entry
			$specific_class = !( $field_title == '' ) ? $class . '-' . $field_title : '';
			
			echo '<div class="' . $specific_class . '">';
			echo wpautop( esc_html( $field_output ) );
			echo '</div><!-- .' . $specific_class . ' -->';
						
		}		
	}	

}


/** SF:
 * Get Custom Field Values: Collections Images (file_list)
 */
function ut_get_file_list( $file_list_meta_key, $img_size = 'full' ) {
	
//	$prefix = 'ut_collections_';
	
	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

	if( !empty( $files ) ){
		
		echo '<div class="slider-container">';
		// Loop through them and output an image
		foreach ( (array) $files as $attachment_id => $attachment_url ) {

			echo '<div class="slide-entry">';
			echo wp_get_attachment_image( $attachment_id, $img_size );
			echo '</div>';

		}
		echo '</div>';		
		
	}
}

/** SF:
 * Get Custom Field Values: Pages
 */
function ut_get_pages_data( $prefix, $field, $class ) {
	
	
	// GET THE FIELD VALUES //
	$field_value = get_post_meta( get_the_ID(), $prefix . $field, true );
	
	
	// CONSTRUCT MARKUP WITH VALUE //
	
	// checks weather a field value exist or not
	if ( !empty( $field_value ) ) {
		
		//add specific class to each entry
		$specific_class = !( $field == '' ) ? $class . '-' . $field : '';
			
		echo '<div class="' . $specific_class . '">';
		echo wpautop( __( $field_value ) );
		echo '</div><!-- .' . $specific_class . ' -->';
						
	}	
	
}
	



/** SF:
 * Display Post Types in homepage
 */
function ut_display_home_posts( $query ) {
	
  if ( !is_admin() && $query->is_main_query() ) {
	  
    if ( $query->is_home() ) {
      $query->set( 'post_type', array( 'collection', 'events' ) );
    }
  }
	
}

add_action( 'pre_get_posts', 'ut_display_home_posts' );


/** SF:
 *  Add insert data-lang attribute to main navigation
 */
add_filter( 'nav_menu_link_attributes', 'ut_main_menu_attributes', 10, 3 );

function ut_main_menu_attributes( $atts, $item, $args ) {
	
	// checks with menu object the filter will be applyed on
	if ( !empty( $atts ) ) {
		
		// get term object by name as title
		$name = $item->title;
		
		
		// SWITCH CASE: (currently the translated term is not saved in the DB)
		switch ( $name ) {

			case 'Collection' :
				$name_jp = 'コレクション';
				break;

			case 'Events' :
				$name_jp = 'イベント';
				break;

			case 'About' :
				$name_jp = 'ブランドについて';
				break;
				
			case 'Contact' :
				$name_jp = '問い合わせ先';
				break;				

			default:
				// code to be executed if n is different from all labels;
		}		
		
		// insert the data-lang attribute
		$atts['data-lang'] = $name_jp;
	}

	return $atts;
}



/** SF:
 *  Disable Editor in Pages
 */
add_action('init', 'ut_remove_editor_from_post_type');

function ut_remove_editor_from_post_type() {
	
    remove_post_type_support( 'page', 'editor' );
	
}
