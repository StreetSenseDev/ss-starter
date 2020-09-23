<?php

// Excerpt Control

function qb_starter_excerpt_more( $more ) {
	return ' <br /><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('+ Read more', 'qbstarter') . '</a>';
}
add_filter( 'excerpt_more', 'qb_starter_excerpt_more' );

function qb_starter_excerpt_length($length) {
    return 50;
}
add_filter('excerpt_length', 'qb_starter_excerpt_length');