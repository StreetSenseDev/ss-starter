<?php
/*

 * @category   Functions
 * @package    qbstarter
 * @author     John Hanusek <john.hanusek@quallsbenson.com>
 * @copyright  2010-2020 Qualls Benson LLC
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 0.0.1
 * @link       https://github.com/jcnh74/qbstarter
 * @since      Class available since Release 0.0.1
*/

use QBStarter\AutoLoader;
use QBStarter\View;

/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */
require get_stylesheet_directory() . '/app/AutoLoader.php';
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'QBStarter', get_stylesheet_directory() . '/app' );

View::$view_dir = get_stylesheet_directory() . '/templates/views';

// First things first add_theme_support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

// // Custom Styles and Javascript
require_once locate_template('/inc/scripts-and-styles.php');

// Custom Post Types
require_once locate_template('/inc/custom-post-type-locations.php');		// Custom Post Type Locations
//require_once locate_template('/inc/custom-post-type-vendor.php');		// Custom Post Type Vendors

// Custom Admin Columns
require_once locate_template('/inc/custom-admin-columns.php');

//Shortcodes
require_once locate_template('/inc/shortcodes/more-shortcode.php');		// More Shortcode

// Media Utilites - Youtube, Vimeo Etc
require_once locate_template('/inc/custom-media-utilities.php');

// Custom Excerpts
require_once locate_template('/inc/custom-excerpt-control.php');

// Custom Menus
require_once locate_template('/inc/custom-menus.php');

// Change Posts Naming
require_once locate_template('/inc/custom-menus.php');

// Additional Utilities
require_once locate_template('/inc/custom-utilities.php');

// Custom Admin
require_once locate_template('/inc/custom-admin.php');

// ACF Settings
require_once locate_template('/inc/custom-acf.php');

// Custom Blocks
require_once locate_template('/inc/custom-blocks.php');

// MC4WP
// add_action( 'mc4wp_form_subscribed', function() {
//   // do something
//   $value = true;
//   setcookie("mc4wp_form_subscribed", $value);
// });


function setEnvironment() {
  global $env;
  global $showPopup;
  $env = '';
  if (strpos($_SERVER['HTTP_HOST'], 'dev') !== false && strpos($_SERVER['HTTP_HOST'], 'wpengine')  !== false) {
    $env = 'development';
  }elseif(strpos($_SERVER['HTTP_HOST'], 'stg') !== false && strpos($_SERVER['HTTP_HOST'], 'wpengine')  !== false){
    $env = 'staging';
  }elseif(strpos($_SERVER['HTTP_HOST'], '.local') !== false){
    $env = '_development';
  }else{
    $env = 'production';
  }
  $showPopup = ($_COOKIE['mc4wp_form_subscribed'] == 1) ? false : true;
}
add_action( 'after_setup_theme', 'setEnvironment' );












 
