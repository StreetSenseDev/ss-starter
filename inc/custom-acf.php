<?php
/*
 * @category   Custom
 * @package    qb-starter
 * @author     John Hanusek <john.hanusek@quallsbenson.com>
 * @copyright  2010-2020 Qualls Benson LLC
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 0.0.1
 * @link       https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 * @since      Class available since Release 0.0.1
*/


// ACF Settings
add_filter('acf/settings/save_json', function() {
	return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
	$paths = array(get_template_directory() . '/acf-json');

	return $paths;
});
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


// add_action('acf/init', 'qb_starter_acf_init');
// function qb_starter_acf_init() {
	
// 	// check function exists
// 	if( function_exists('acf_register_block') ) {
		
// 		// register a Gallery block
// 		acf_register_block(array(
// 			'name'				=> 'gallery',
// 			'title'				=> __('Gallery'),
// 			'description'		=> __('A custom gallery block.'),
// 			'render_callback'	=> 'qb_starter_acf_block_render_callback',
// 			'category'			=> 'qb-starter',
// 			'icon'				=> array(
//         // Specifying a background color to appear with the icon e.g.: in the inserter.
//         'background' => 'rgb(251,126,87)',
//         // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
//         'foreground' => '#fff',
//         // Specifying a dashicon for the block
//         'src' => 'images-alt2',
//       ),
// 			'keywords'			=> array( 'gallery', 'images', 'slideshow', 'qb-starter' ),
// 		));
// 	}
// }


// function qb_starter_acf_block_render_callback( $block ) {
	
// 	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
//   $slug = str_replace('acf/', '', $block['name']);
  
// 	// include a template part from within the "template-parts/block" folder
// 	if( file_exists( get_theme_file_path("/partials/blocks/{$slug}.php") ) ) {
// 		include( get_theme_file_path("/partials/blocks/{$slug}.php") );
// 	}
// }



