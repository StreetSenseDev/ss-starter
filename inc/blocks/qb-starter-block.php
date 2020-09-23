<?php
/**
 * Block Name:   Advanced Gallery
 *
 * This is the template that displays the slideshow block.
 */


$gallery = get_field('gallery');



$className = '';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


// create id attribute for specific styling
$id = 'section-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>


<section class="advanced-gallery <?php echo $className; ?>" id="<?php echo $id; ?>">
  <div class="advanced-gallery-slick viewport">
    <?php
      if( have_rows('gallery') ):
        $count = 0;
        while ( have_rows('gallery') ) : the_row();
          // display a sub field value
          $gallery_title = get_sub_field('gallery_title'); 
          $image_feature = get_sub_field('image_feature'); 
          $gallery_description = get_sub_field('gallery_description'); 
          $sub_gallery_images = get_sub_field('sub_gallery_images'); 
            
    ?>
    <div class="slide" data-count="<?php echo $count; ?>">
      <div class="sub-gallery">
             
      
<?php 


        $sub_gallery_images = get_sub_field('sub_gallery');
        
        $sub_gallery_images1 = array_slice($sub_gallery_images, 0, floor(count($sub_gallery_images) / 2));
        $sub_gallery_images2 = array_slice($sub_gallery_images, floor(count($sub_gallery_images) / 2), count($sub_gallery_images));

      ?>
        <div class="masonry">
        <?php if( $sub_gallery_images1 ): ?>
          <div class="col-one">
            <img class="item part" src="<?php echo $image_feature['url']; ?>" alt="<?php echo wp_get_attachment_caption($image_feature->ID); ?>" 
              srcset="<?php echo $image_feature['sizes']['large']; ?> 1024w, 
                    <?php echo $image_feature['sizes']['thumbnail']; ?> 300w, 
                    <?php echo $image_feature['sizes']['medium']; ?> 768w, 
                    <?php echo $image_feature['url']; ?> 1244w"
              sizes="(max-width: 1024px) 100vw, 1024px">
            <?php 
              foreach($sub_gallery_images1 as $image) : 
                // print_r( $image);
              // $image = $image['image'];
            ?>
            <img  class="item part" src="<?php echo $image['url']; ?>" alt="<?php echo wp_get_attachment_caption($image->ID); ?>" 
                srcset="<?php echo $image['sizes']['large']; ?> 1024w, 
                      <?php echo $image['sizes']['thumbnail']; ?> 300w, 
                      <?php echo $image['sizes']['medium']; ?> 768w, 
                      <?php echo $image['url']; ?> 1244w"
                sizes="(max-width: 1024px) 100vw, 1024px">
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if( $sub_gallery_images2 ): ?>
          <div class="col-two">
            <div class="details part">
              <?php echo $gallery_description; ?>
            </div>
            <?php  
              foreach($sub_gallery_images2 as $image) : 
              //$image = $image['image'];
            ?>
            <img  class="item part" src="<?php echo $image['url']; ?>" alt="<?php echo wp_get_attachment_caption($image->ID); ?>" 
                srcset="<?php echo $image['sizes']['large']; ?> 1024w, 
                      <?php echo $image['sizes']['thumbnail']; ?> 300w, 
                      <?php echo $image['sizes']['medium']; ?> 768w, 
                      <?php echo $image['url']; ?> 1244w"
                sizes="(max-width: 1024px) 100vw, 1024px">
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
          </div>
        </div>

      <h4><?php echo $gallery_title; ?></h4>
        <img src="<?php echo $image_feature['url']; ?>" alt="<?php echo wp_get_attachment_caption($image_feature->ID); ?>" 
          srcset="<?php echo $image_feature['sizes']['large']; ?> 1024w, 
                <?php echo $image_feature['sizes']['thumbnail']; ?> 300w, 
                <?php echo $image_feature['sizes']['medium']; ?> 768w, 
                <?php echo $image_feature['url']; ?> 1244w"
          sizes="(max-width: 1024px) 100vw, 1024px">
      </div>
      <?php
      $count++;
    endwhile;

  else :

    // no rows found

  endif;
?>
</div>
    <ul class="gallery-nav">
        <li class="prev"></li>
        <li class="next"></li>
    </ul>
    <div class="close"></div>
  </div>
</section>
