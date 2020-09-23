<?php

function more_shortcode( $atts, $content = null){
  $_content = '<div class="more">';
  $_content .= '<div class="show-more">+ more</div>';
  $_content .= '<div class="more-content">';
  $_content .= $content;
  $_content .= '</div>';
  $_content .= '</div>';
	return $_content;
}
add_shortcode( 'more', 'more_shortcode' );

?>