<?php

/*
Plugin Name: MPD150 Futures
Description: Used to generate the futures grid
Version: 1.0
Author: Peter VanKoughnett
Author URI: bigriverwebdesign.com
License: GPLv2 or later
*/

function create_posttype_future() {
 
    register_post_type( 'futures',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Futures' ),
                'singular_name' => __( 'Future' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Futures'), 
            'supports' => array('title','author')
        )
    );
}
add_action( 'init', 'create_posttype_future' );
