<?php

/*
 * @category   Custom
 * @package    qbstarter
 * @author     John Hanusek <john.hanusek@quallsbenson.com>
 * @copyright  2010-2020 Qualls Benson LLC
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 0.0.1
 * @link       https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 * @since      Class available since Release 0.0.1
*/

// Custom Admin Styles 
function qb_starter_wp_admin_style() {
  /*
  * This is a Custom Function for adding a custom admin stylesheet
  * to the Wordpress admin of this installed theme
  */
  wp_enqueue_style('admin-blocks', get_theme_file_uri('/build/css/admin-style.min.css'), array());
  wp_enqueue_script( 'admin-blocks-slick', get_theme_file_uri( '/src/js/plugins/slick.min.js'), array() );
  wp_enqueue_script( 'admin-blocks-js', get_theme_file_uri( '/build/js/admin.min.js'), array() );

}
add_action( 'admin_enqueue_scripts', 'qb_starter_wp_admin_style' );