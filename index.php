<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage qb-starter
 * @since qb-starter Theme 1.0
 */

get_header();
?>


<?php while ( have_posts() ) : the_post(); ?>
<main id="page" class="sections interior index-php">
  <div class="section-wrapper">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</main>
<?php endwhile; ?>

<?php get_footer(); ?>
