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
$vendor = get_field('vendor');
$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];

?>
<div id="page" class="collection recipe">
  <div class="page-wrapper">
    <div class="sections">
      <div class="section-wrapper">
        <div class="flex">
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="flex-2" style="max-width:50%;">
            <div class="single-header text-center">
              <a href="<?php the_permalink(); ?>"" class="image-wrapper "><?php the_post_thumbnail( $size, $attr ); ?></a>
              <p class="entry-date"><?php echo get_the_date('n/j/y'); ?></p>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div>
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>" class="spice underline">Read More</a></p>
          </div>
            <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
