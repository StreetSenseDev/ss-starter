<?php
/*
Template Name: Zine
*/

get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
$main_feture = get_field('main_feture');
$category = get_the_category($main_feture->ID);

$secondary_features = get_field('secondary_features');
$subtitle = get_field('article_subtitle', $main_feture->ID);
$image = wp_get_attachment_image_src( get_post_thumbnail_id($main_feture->ID), 'large')[0];
$author = get_the_author( $main_feture->ID);
$cat = $_GET["cat"] ? $_GET["cat"] : '';

?>

<div class="sections zine">
  <div class="feature-article">
    <div class="feature-article-wrap">
      <a href="<?php echo get_permalink($main_feture->ID); ?>" class="img" style="background-image:url(<?php echo $image; ?>);"></a>
      <div class="copy">
        <div>
        <p class="category"><?php echo $category[0]->name; ?></p>
          <h1 class="orange"><a href="<?php echo get_permalink($main_feture->ID); ?>"><?php echo get_the_title($main_feture->ID); ?></a></h1>
          <p class="author">by <?php echo $author; ?></p>
          <?php if($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
          <?php endif; ?>
          <p><a href="<?php echo get_permalink($main_feture->ID); ?>" class="orange"> + read more</a></p>
        </div>
      </div>
    </div>          
  </div>
</div>

<div id="zine-menu">
  <div class="menu-wrapper">
    <div class="link">
      
    </div>
    <div class="title">Qualls Benson Starter Theme Zine</div>
    <div class="dropdown">
      <!-- Filter Categories ▾ -->
    </div>
  </div>
  <!-- <div id="categories-menu">
    <div class="menu-wrapper">
      <ul>
      <?php 
      $terms = get_terms( 'category', array(
        'hide_empty' => false,
      ) );
  foreach($terms as $term) : ?>
    <li><a href="?cat=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
  <?php endforeach;
      ?>
      </ul>
    </div>
  </div> -->
</div>
<?php 

$exclude_post = array($main_feture->ID, $secondary_features[0]->ID,  $secondary_features[1]->ID);
    
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'sort_column'   => 'menu_order',
    'posts_per_page' => -1,
    'post__not_in' => $exclude_post

  );
  if($cat){
    $args['tax_query'] = array(
      array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => $cat,
          'operator' => 'IN'
      )
    );
  }
  // define loop
  $loop = new WP_Query( $args );
  if($loop->have_posts()) :  ?>

              
              <div class="section collection articles featured bind count-2 <?php echo $className; ?> <?php echo $align_class; ?> <?php echo $tint; ?>">
                <div class="row-wrap">
                  <div class="row">


                  <?php foreach($secondary_features as $feature) : ?>

                  <?php
                  
                  $custom_image = wp_get_attachment_image_src( get_post_thumbnail_id($feature->ID), 'large');
                  $author = get_the_author_meta( 'display_name' , $feature->post_author);
                  $category = get_the_category($feature->ID);

                  ?>

                  <div class="col">
                    <a href="<?php the_permalink($feature->ID); ?>" class="anchor-img"><div class="img" style="background-image:url(<?php echo $custom_image[0]; ?>);" role="img" aria-label="<?php echo get_the_title($feature->ID); ?>"></div></a>

                      <div class="text-block item">
                        <p class="category"><?php echo $category[0]->name; ?></p>
                        <h3><a href="<?php echo get_permalink($feature->ID); ?>"><?php echo get_the_title($feature->ID); ?></a></h3>
                        <p class="author">By <?php echo $author; ?></p>
                        <p class="more"><a href="<?php echo get_permalink($feature->ID); ?>" class="orange">+ Read more</a></p>

                      </div>
                    </div>

              <?php endforeach; ?>
              </div>
              </div>
</div>
<div class="section collection articles bind count-4 <?php echo $className; ?> <?php echo $align_class; ?> <?php echo $tint; ?>">

<div class="row-wrap">
                  <div class="row <?php echo $text_size; ?>">

            <?php
                while ($loop->have_posts()) : $loop->the_post();
                  $custom_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                  $author = get_the_author();
                  $category = get_the_category();


                  ?>
                    <div class="col">
                      <a href="<?php the_permalink(); ?>" class="anchor-img">
                      <img src="<?php echo $custom_image[0]; ?>" />
                    </a>
                      <div class="text-block item">
                        <p class="category"><?php echo $category[0]->name; ?></p>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="author">By <?php echo $author; ?></p>
                        <p class="more"><a href="<?php the_permalink(); ?>" class="orange">+ Read more</a></p>
                      </div>
                    </div>
                  <?php
                endwhile; 
                ?>
                  </div>
                </div>
              </div>
              <?php 
            //$loop->reset_postdata(); 
            wp_reset_postdata(); 
          endif;
    ?>


<?php endwhile; ?>

<?php get_footer(); ?>
