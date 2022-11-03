<?php


use qbstarter\AssetResolver;


add_action('wp_enqueue_scripts', function () {

	// register custom fonts
	wp_enqueue_style('theivy-fonts', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300&display=swap');
	// wp_enqueue_style('theivy-fontawesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	// registers scripts and stylesheets
	wp_register_style('app-css', AssetResolver::resolve('css/app.css'), [], false);
	wp_register_script('app-js', AssetResolver::resolve('js/app.js'), [], false, true);

	// enqueue global assets
	// wp_enqueue_script( 'jquery' );
	// wp_enqueue_script("jquery-effects-core");
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-ui-core');
	wp_deregister_style('classic-theme-styles');
	wp_enqueue_style('app-css');
	wp_enqueue_script('app-js');
});


add_action('admin_enqueue_scripts', function ($hook) {
	if ('post.php' != $hook) {
		return;
	}

	// register custom fonts
	wp_enqueue_style('theivy-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap');
	// wp_enqueue_style('jsq2-2020-fontawesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	// registers scripts and stylesheets
	wp_register_style('admin-css', AssetResolver::resolve('css/admin.css'), [], false);
	wp_register_script('admin-js', AssetResolver::resolve('js/admin.js'), [], false, true);

	// enqueue global assets
	wp_enqueue_script('jquery');
	wp_enqueue_script("jquery-effects-core");
	wp_enqueue_style('admin-css');
	wp_enqueue_script('admin-js');
});


function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');
/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}

function smartwp_remove_wp_block_library_css()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);
