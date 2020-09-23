<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage qbstarter
 * @since qbstarter Theme 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">

<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php if(get_field('favicon', 'option')) : ?>
	<link rel="shortcut icon" href="<?php echo get_field('favicon', 'options')['url']; ?>" />
<?php endif; ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(''); ?>>
  <header>
    <div class="main-banner">
			<a href="/" class="logo">
        <h1>QB Starter</h1>
			</a>
    </div>
  </header>



