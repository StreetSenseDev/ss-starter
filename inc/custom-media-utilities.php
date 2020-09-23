<?php

// Media Utilites
function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if ($result) {
        return $matches[1];
    }
    return false;
}

function vimeo_id_from_url($url) {
	if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $output_array)) {
		return $output_array[5];
	}
}

function generate_video_embed_url($url) {
	$output = '';
    if (strpos($url, 'youtube') > 0) {
    	$output = 'https://www.youtube.com/embed/' . youtube_id_from_url($url);
    } elseif (strpos($url, 'vimeo') > 0) {
        $output ='https://player.vimeo.com/video/'. vimeo_id_from_url($url) .'?title=0&byline=0';
    }
    return $output;
}

