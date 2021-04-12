<?php

/*
 * @category   Custom
 * @package    qb-starter
 * @author     John Hanusek <john.hanusek@quallsbenson.com>
 * @copyright  2010-2020 Qualls Benson LLC
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 0.0.1
 * @link       https://codex.wordpress.org/Function_Reference/register_post_type
 * @link       https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @since      Available since Release 0.0.1
*/


add_action( 'init', 'create_post_type_location' );
function create_post_type_location() {
	register_post_type( 'location',
		array(
			'labels' => array(
				'name' => __( 'Locations' ),
				'singular_name' => __( 'Location' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Location' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Location' ),
				'new_item' => __( 'New Location' ),
				'view' => __( 'View Location' ),
				'view_item' => __( 'View Location' ),
				'search_items' => __( 'Search Locations' ),
				'not_found' => __( 'No Locations found' ),
				'not_found_in_trash' => __( 'No Locations found in Trash' ),
				'parent' => __( 'Parent Location' )
			),
		'description' => __( 'A Location is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.' ),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'menu_icon'   => 'dashicons-location',
		'menu_position' => 4,
    'show_in_nav_menus' => true,
    'show_in_rest' => false,
    'hierarchical' => true,
		'supports' => array( 'title', 'revisions' /* , 'page-attributes', 'excerpt', 'page-attributes' */ ),
		'taxonomies' => array('location_category'), // this is IMPORTANT
		)
	);
}

// hook into the init action and call create_book_taxonomies() when it fires
add_action( 'init', 'create_location_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_location_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Categories', 'Category general name' ),
		'singular_name' => _x( 'Category', 'Category singular name' ),
		'search_items' =>  __( 'Search Categories' ),
		'all_items' => __( 'All Categories' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Type Category' ),
	); 	

	register_taxonomy( 'location_category', array( 'location' ), array(
		'hierarchical' => true,
		'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
		'show_ui' => true,
    'query_var' => true,
    'show_in_rest' => false,
		'rewrite' => array( 'slug' => 'location-category' ),
  ));
  
  // $labels2 = array(
	// 	'name' => _x( 'Types', 'Types general name' ),
	// 	'singular_name' => _x( 'Type', 'Types singular name' ),
	// 	'search_items' =>  __( 'Search Types' ),
	// 	'all_items' => __( 'All Types' ),
	// 	'parent_item' => __( 'Parent Type' ),
	// 	'parent_item_colon' => __( 'Parent Type:' ),
	// 	'edit_item' => __( 'Edit Type' ),
	// 	'update_item' => __( 'Update Type' ),
	// 	'add_new_item' => __( 'Add New Type' ),
	// 	'new_item_name' => __( 'New Type' ),
	// ); 	

	// register_taxonomy( 'event_type', array( 'event' ), array(
	// 	'hierarchical' => true,
	// 	'labels' => $labels2, /* NOTICE: Here is where the $labels variable is used */
	// 	'show_ui' => true,
  //   'query_var' => true,
  //   'show_in_rest' => true,
	// 	'rewrite' => array( 'slug' => 'event-type' ),
  // ));

  // $labels3 = array(
	// 	'name' => _x( 'Tags', 'Tags general name' ),
	// 	'singular_name' => _x( 'Tag', 'Tags singular name' ),
	// 	'search_items' =>  __( 'Search Tags' ),
	// 	'all_items' => __( 'All Tags' ),
	// 	'parent_item' => __( 'Parent Tag' ),
	// 	'parent_item_colon' => __( 'Parent Tag:' ),
	// 	'edit_item' => __( 'Edit Tag' ),
	// 	'update_item' => __( 'Update Tag' ),
	// 	'add_new_item' => __( 'Add New Tag' ),
	// 	'new_item_name' => __( 'New Tag' ),
	// ); 	

	// register_taxonomy( 'event_tag', array( 'event' ), array(
	// 	'hierarchical' => false,
	// 	'labels' => $labels3, /* NOTICE: Here is where the $labels variable is used */
	// 	'show_ui' => true,
  //   'query_var' => true,
  //   'show_in_rest' => true,
	// 	'rewrite' => array( 'slug' => 'event-tag' ),
	// ));
}



// // hook in admin head styles
// add_action('admin_head', 'post_type_icon_location');

// // override post type icons for the admin menu
// function post_type_icon_location() {
// 	echo '<style type="text/css">
// 			#menu-posts-event div.wp-menu-image:before {
// 				content: "\f073" !important;
// 				font-family: "FontAwesome" !important;
//  				font-size: 18px !important;
// 			}
// 			#acf-field-trial{
// 				height: 3800px !important;
// 			}
// 		</style>';
// }

?>