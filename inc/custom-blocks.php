<?php 

// Custom Blocks
 
function my_plugin_block_categories( $categories, $post ) {
  return array_merge(
      $categories,
      array(
          array(
              'slug' => 'qbstarter-category',
              'title' => __( 'Custom Blocks', 'qbstarter' )
          ),
      )
  );
}
add_filter( 'block_categories', 'my_plugin_block_categories', 10, 2 );

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/inc/blocks/{$slug}.php") ) ) {
		include( get_theme_file_path("/inc/blocks/{$slug}.php") );
	}
}


add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {

    // register a Availabilities Table
		acf_register_block(array(
			'name'				=> 'qb-starter-block',
			'title'				=> __('Starter Block'),
			'description'		=> __('Use this block as a starting point in building a custom Gutenberg Block'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'qbstarter-category',
			'icon'				=> array(
        // Specifying a background color to appear with the icon e.g.: in the inserter.
        'background' => 'rgb(230,230,230)',
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
        'foreground' => '#000',
        // Specifying a dashicon for the block
        'src' => 'editor-table',
      ),
			'keywords'			=> array( 'hero', 'images', 'full width', 'qbstarter'  ),
    ));
  }
}


