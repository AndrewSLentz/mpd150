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


	?>
	<!-- Created by MPD150-Timeline Plugin -->
	<div class='timeline'><?php

	if( $posts ): 
		foreach( $posts as $post ):

			setup_postdata($post); ?>
	
			<div> <!--containing div for timeline gorilla -->
				<span class='preview-title'>
					<h2>
						<?php the_title(); ?>
					</h2>
				</span>
			
				<div <?php post_class('preview_content')?> >
					<div class='summary'>
						<?php the_field('summary'); ?>
					</div>
					<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#modal-<?php the_id();?>'>
						Read More
					</button>
				</div>
			</div>

		<?php endforeach;
		wp_reset_postdata();

	endif;

	?>
	</div> <!-- Timeline -->

	<?php 
	if( $posts ): 
		foreach( $posts as $post ):?>
			<div id='modal-<?php the_id();?>' class='modal fade' role='dialog'>
				<div class="modal-dialog">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>
							<?php the_title(); ?>
						</h2>
					</div>
					<div class="modal-body">
						<?php the_field('content'); ?>
					</div>
				    <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		<?php endforeach;
		wp_reset_postdata();
	endif; ?>

	<script>
			jQuery(document).ready( function($) {
				$('.timeline').timelineGorilla();
			})
	</script>
	
<?php 
}

add_shortcode("timeline", "display_timeline_events");

function timeline_scriptsandstyles() {
	if (is_page("6")) {
    	wp_enqueue_script( 'timeline-gorilla', '/wp-content/plugins/MPD150-Timeline/js/timeline-gorilla/dist/jquery.timeline-gorilla.js', array( 'jquery' ), '1.0.0', true );
    	wp_enqueue_style("timeline-gorilla", '/wp-content/plugins/MPD150-Timeline/js/timeline-gorilla/dist/themes/timeline-gorilla.theme-2.css');
	}
}

add_action("wp_enqueue_scripts", "timeline_scriptsandstyles");