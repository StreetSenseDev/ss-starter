<?php

// Custom Columns
// Add the custom column to the post type -- replace ht_kb with your CPT slug
add_filter( 'manage_event_posts_columns', 'qb_starter_add_custom_column' );
function qb_starter_add_custom_column( $columns ) {
    $columns['category'] = 'Category';
    $columns['featured_image'] = 'Featured Image';
    // $columns['hero_image'] = 'Hero Image';
    $columns['active'] = 'Is Active';

    $n_columns = array();
    $before = 'date'; // move before this
   
    foreach($columns as $key => $value) {
      if ($key==$before){
        $n_columns['title'] = 'Title';
        $n_columns['category'] = 'Category';
        // $n_columns['hero_image'] = 'Hero Image';
        $n_columns['featured_image'] = 'Featured Image';
      }
      $n_columns[$key] = $value;
    }
    return $n_columns;


    //return $columns;
}

add_action('admin_head', 'hidey_admin_head');

function hidey_admin_head() {
    echo '<style type="text/css">';
    echo '.column-featured_image { width:20% !important; overflow:hidden  }';
    // echo '.column-tags { display: none }';
    // echo '.column-author { width:30px !important; overflow:hidden }';
    echo '.column-categories { width:10% !important; overflow:hidden }';
    echo '.column-title {  width:40% !important; overflow:hidden  }';
    echo '</style>';
}

// Add the data to the custom column -- replace ht_kb with your CPT slug
add_action( 'manage_event_posts_custom_column' , 'qb_starter_add_custom_column_data', 10, 2 );
function qb_starter_add_custom_column_data( $column, $post_id ) {
  switch( $column ) {
    case 'category' :
        $terms = get_the_terms( $post_id, 'event_category' );
        if ( !empty( $terms ) ) {
            $out = array();
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a href="%s">%s</a>',
                    esc_url( add_query_arg( array( 'post_type' => 'event', 'event_category' => $term->slug ), 'edit.php' ) ),
                    esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'event_category', 'display' ) )
                );
            }
            echo join( ', ', $out );
        }
        else {
            _e( '' );
        }
        break;
    case 'featured_image' :
        $custom_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id), 'thumbnail');

        echo '<img src="'.$custom_image[0].'" style="height: 50px; width:auto;" />';
        break;
    case 'hero_image' :
        $hero_media = get_field('hero_media', $post_id);
        if (strpos($hero_media, '.jpg') !== false || strpos($hero_media, '.gif') !== false) {
          echo '<img src="'.$hero_media.'" style="height: 50px; width:auto;" />';
        }else{
          echo '';
        }
        break;
    case 'active' :
        $archived_event = get_field( 'archived_event', $post_id );
        if ( $archived_event )
          echo '<span style="color:red;">is archived</span>';
        else
          echo '<span style="color:green;">in calendar</span>';
        break;


    default :
        break;
      
  }
}

// Make the custom column sortable -- replace ht_kb with your CPT slug
add_filter( 'manage_edit-event_sortable_columns', 'qb_starter_add_custom_column_make_sortable' );
function qb_starter_add_custom_column_make_sortable( $columns ) {
	$columns['category'] = 'Category';

	return $columns;
}

// Add custom column sort request to post list page
add_action( 'load-edit.php', 'qb_starter_add_custom_column_sort_request' );
function qb_starter_add_custom_column_sort_request() {
	add_filter( 'request', 'qb_starter_add_custom_column_do_sortable' );
}

// Handle the custom column sorting
function qb_starter_add_custom_column_do_sortable( $vars ) {

	// check if post type is being viewed -- replace ht_kb with your CPT slug
	if ( isset( $vars['post_type'] ) && 'event' == $vars['post_type'] ) {

		// check if sorting has been applied
		if ( isset( $vars['orderby'] ) && 'usefulness' == $vars['orderby'] ) {

			// apply the sorting to the post list
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => '_ht_kb_usefulness',
					'orderby' => 'meta_value_num'
				)
			);
		}
	}

	return $vars;
}



add_filter( 'manage_honoree_posts_columns', 'qb_starter_add_custom_column_honoree' );
function qb_starter_add_custom_column_honoree( $columns ) {
    $columns['tag'] = 'Tags';
    $columns['featured_image'] = 'Featured Image';


    $n_columns = array();
    $before = 'date'; // move before this
   
    foreach($columns as $key => $value) {
      if ($key==$before){
        $n_columns['title'] = 'Title';
        $n_columns['tag'] = 'Tags';
        $n_columns['featured_image'] = 'Featured Image';
      }
      $n_columns[$key] = $value;
    }
    return $n_columns;


    //return $columns;
}

// Add the data to the custom column -- replace ht_kb with your CPT slug
add_action( 'manage_honoree_posts_custom_column' , 'qb_starter_add_custom_honoree_column_data', 10, 2 );
function qb_starter_add_custom_honoree_column_data( $column, $post_id ) {
  switch( $column ) {
    case 'tag' :
        $terms = get_the_terms( $post_id, 'honoree_tag' );
        if ( !empty( $terms ) ) {
            $out = array();
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a href="%s">%s</a>',
                    esc_url( add_query_arg( array( 'post_type' => 'event', 'honoree_tag' => $term->slug ), 'edit.php' ) ),
                    esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'honoree_tag', 'display' ) )
                );
            }
            echo join( ', ', $out );
        }
        else {
            _e( '' );
        }
        break;
    case 'featured_image' :
        $custom_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id), 'thumbnail');

        echo '<img src="'.$custom_image[0].'" style="height: 50px; width:auto;" />';
        break;
    default :
        break;
      
  }
}

// Make the custom column sortable -- replace ht_kb with your CPT slug
add_filter( 'manage_edit-honoree_sortable_columns', 'qb_starter_add_custom_column_make_honoree_sortable' );
function qb_starter_add_custom_column_make_honoree_sortable( $columns ) {
	$columns['tag'] = 'Tag';

	return $columns;
}
