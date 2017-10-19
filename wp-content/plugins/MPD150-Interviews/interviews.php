<?php

/*
Plugin Name: MPD150 Interviews
Description: Used to generate the interviews grid
Version: 1.0
Author: Peter VanKoughnett
Author URI: bigriverwebdesign.com
License: GPLv2 or later
*/

function create_posttype_interview() {
 
    register_post_type( 'interviews',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Interviews' ),
                'singular_name' => __( 'Interview' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Interviews'), 
            'supports' => array('title','author')
        )
    );
}
add_action( 'init', 'create_posttype_interview' );


function display_interviews() {
	
}

add_shortcode("interviews", "display_interviews");
