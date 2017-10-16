<?php

/*
Plugin Name: MPD150 Timeline
Description: Used to generate the timeline.
Version: 1.0
Author: Peter VanKoughnett
Author URI: bigriverwebdesign.com
License: GPLv2 or later
*/

/* Add Timeline Event custom post type */

function create_posttype_timeline_event() {
 
    register_post_type( 'timeline-events',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Timeline Events' ),
                'singular_name' => __( 'Timeline Event' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Timeline Events'), 
            'supports' => array('title','author')
        )
    );
}
add_action( 'init', 'create_posttype_timeline_event' );

function display_timeline_events() {
	global $post;
	$posts = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'timeline-events'
	));


	$html = "<div class='timeline'>";

	if( $posts ): 
		foreach( $posts as $post ):
			setup_postdata($post);
			$html .= sprintf("<div><span class='preview-title'>%s</span>", (get_field("display-title")?get_field("display-title"):get_the_title()) );  //adds the display title if it exists, otherwise adds the default title
			$html .= sprintf("<div class='preview-content'>%s</div></div>",get_field('summary'));
		endforeach;
		wp_reset_postdata();
	endif;

	$html .= "</div>";
	$html .= "<script>
				jQuery(document).ready( function($) {
					$('.timeline').timelineGorilla();
				})
			</script>";
	echo $html;
}

add_shortcode("timeline", "display_timeline_events");

function timeline_scriptsandstyles() {
	if (is_page("6")) {
    	wp_enqueue_script( 'timeline-gorilla', '/wp-content/plugins/MPD150-Timeline/js/timeline-gorilla/dist/jquery.timeline-gorilla.js', array( 'jquery' ), '1.0.0', true );
    	wp_enqueue_style("timeline-gorilla", '/wp-content/plugins/MPD150-Timeline/js/timeline-gorilla/dist/themes/timeline-gorilla.theme-2.css');
	}
}

add_action("wp_enqueue_scripts", "timeline_scriptsandstyles");