<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */


/** UT CMB2 Functions Inventory
 *  
 * CUSTOM POST TYPE: COLLECTIONS
 * CUSTOM POST TYPE: EVENTS
 * PAGES TEXTS: ABOUT, CONTACT 
 *
 */




/*
*
* CUSTOM POST TYPE: COLLECTIONS //////////////////////////////////////////////
* 
* [file_list] images
* [text] Name JP
* [text] Dimensions
* [textarea] Details EN
* [textarea] Details JP
*
*/
add_action( 'cmb2_admin_init', 'ut_register_collections_metabox' );

function ut_register_collections_metabox() {
	$prefix = 'ut_collections_';

	// META BOX
	$cmb_collections = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Collections Data', 'cmb2' ),
		'object_types'  => array( 'collection' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );	
	
	// FIELD: image list
	$cmb_collections->add_field( array(
		'name' => esc_html__( 'Image', 'cmb2' ),
		'desc' => esc_html__( 'product or campaign image', 'cmb2' ),
		'id'   => $prefix . 'file_list',
		'type' => 'file_list',
		'preview_size' => array( 0, 0 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => esc_html__( 'Add Image', 'cmb2' ), // default: "Add or Upload Files"
			'remove_image_text' => esc_html__( 'Remove Image', 'cmb2' ), // default: "Remove Image"
			'file_text' => esc_html__( 'File:', 'cmb2' ), // default: "File:"
			'file_download_text' => esc_html__( 'Download', 'cmb2' ), // default: "Download"
			'remove_text' => esc_html__( 'Remove', 'cmb2' ), // default: "Remove"
		),
	) );
	
	// FIELD: Name EN
	$cmb_collections->add_field( array(
		'name' => esc_html__( 'Name EN', 'cmb2' ),
		'desc' => 'e.g. Bowl Medium',
		'type' => 'text',
		'id'   => $prefix . 'name_en'
	) );	
	
	// FIELD: Name JP
	$cmb_collections->add_field( array(
		'name' => esc_html__( 'Name JP', 'cmb2' ),
		'desc' => 'e.g. ボール 中',
		'type' => 'text',
		'id'   => $prefix . 'name_jp'
	) );
	
	// FIELD: Dimensions
	$cmb_collections->add_field( array(
		'name' => esc_html__( 'Dimensions', 'cmb2' ),
		'desc' => 'e.g. ø 140 x 55 mm',
		'type' => 'text',
		'id'   => $prefix . 'dimensions'
	) );	
	
	// FIELD: Details EN
	$cmb_collections->add_field( array(
		'name' => esc_html__( 'Details EN', 'cmb2' ),
		'desc' => esc_html__( 'product details in english', 'cmb2' ),
		'default' => '',
		'type' => 'textarea',
		'id'   => $prefix . 'details_en'
	) );
	
	// FIELD: Details JP
	$cmb_collections->add_field( array(
		'name' => esc_html__( 'Details JP', 'cmb2' ),
		'desc' => esc_html__( 'product details in japanese', 'cmb2' ),
		'default' => '',
		'type' => 'textarea',
		'id'   => $prefix . 'details_jp'
	) );	
	
}



/*
*
* CUSTOM POST TYPE: EVENTS //////////////////////////////////////////////
* 
* [text] title JP
* [text_date] event date
* [wysiwyg] event body text EN
* [wysiwyg] event body text JP
*
*/

add_action( 'cmb2_admin_init', 'ut_register_events_metabox' );

function ut_register_events_metabox() {
	$prefix = 'ut_events_';

	// META BOX
	$cmb_events = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Event Information', 'cmb2' ),
		'object_types'  => array( 'events' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );
	
	// FIELD: Date
	$cmb_events->add_field( array(
		'name' => esc_html__( 'Date', 'cmb2' ),
		'id'   => $prefix . 'date',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

	// FIELD: Event Text EN
	$cmb_events->add_field( array(
		'name'    => esc_html__( 'Text EN', 'cmb2' ),
		'desc'    => esc_html__( 'event text in EN', 'cmb2' ),
		'id'   => $prefix . 'text_en',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );
	
	// FIELD: Event Text JP
	$cmb_events->add_field( array(
		'name'    => esc_html__( 'Text JP', 'cmb2' ),
		'desc'    => esc_html__( 'event text in JP', 'cmb2' ),
		'id'   => $prefix . 'text_jp',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );	
}

/*
*
* PAGES: CONTACT TITLES //////////////////////////////////////////////
*/
add_action( 'cmb2_admin_init', 'ut_register_contact_metabox' );

function ut_register_contact_metabox() {
	$prefix = 'ut_contact_';
	
	// META BOX
	$cmb_contact = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Contact', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'	    => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );
	
	// FIELD: Company Name EN
	$cmb_contact->add_field( array(
		'name'    => esc_html__( 'Company Name EN', 'cmb2' ),
		'desc'    => esc_html__( 'text in EN', 'cmb2' ),
		'id'   => $prefix . 'title_en',
		'type'    => 'text_medium',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );
	
	// FIELD: Company Name JP
	$cmb_contact->add_field( array(
		'name'    => esc_html__( 'Company Name JP', 'cmb2' ),
		'desc'    => esc_html__( 'text in EN', 'cmb2' ),
		'id'   => $prefix . 'title_jp',
		'type'    => 'text_medium',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );	
	
}


/*
*
* PAGES: ABOUT, CONTACT //////////////////////////////////////////////
*/
add_action( 'cmb2_admin_init', 'ut_register_pages_text_metabox' );

function ut_register_pages_text_metabox() {
	$prefix = 'ut_pages_text_';
	
	// META BOX
	$cmb_pages = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Main Content', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );	
	
	// FIELD: Event Text EN
	$cmb_pages->add_field( array(
		'name'    => esc_html__( 'Text EN', 'cmb2' ),
		'desc'    => esc_html__( 'text in EN', 'cmb2' ),
		'id'   => $prefix . 'text_en',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );
	
	// FIELD: Event Text JP
	$cmb_pages->add_field( array(
		'name'    => esc_html__( 'Text JP', 'cmb2' ),
		'desc'    => esc_html__( 'text in JP', 'cmb2' ),
		'id'   => $prefix . 'text_jp',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );	
}

/*
*
* PAGES: ABOUT CREDITS //////////////////////////////////////////////
*/
add_action( 'cmb2_admin_init', 'ut_register_about_metabox' );

function ut_register_about_metabox() {
	$prefix = 'ut_aobut_';
	
	// META BOX
	$cmb_about = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Credits', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'	    => array( 'key' => 'page-template', 'value' => 'page-about.php' ),
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );
	
	// FIELD: Credits EN
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Credits EN', 'cmb2' ),
		'desc'    => esc_html__( 'text in EN', 'cmb2' ),
		'id'   => $prefix . 'credits_en',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );
	
	// FIELD: Credits JP
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Credits JP', 'cmb2' ),
		'desc'    => esc_html__( 'text in JP', 'cmb2' ),
		'id'   => $prefix . 'credits_jp',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)			
			'teeny' => true // output the minimal editor config used in Press This
		),
	) );	
	
}

