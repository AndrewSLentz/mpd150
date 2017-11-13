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
	$modal_html = '';



	$meta_query = array(
		array(	
			'key' => 'date',
			'value' => date('Ymd'),
			'type' => 'DATE',
			'compare' => '<='
			)
	);


	$posts = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'timeline-events',
		'orderby' => 'meta_value',
		'meta_key' => 'date',
		'order'	=> 'ASC',
	));


	?>
	<!-- Created by MPD150-Timeline Plugin -->
	<div class='timeline'><?php

	if( $posts ): 
		foreach( $posts as $post ):

			setup_postdata($post); 
			$slug = sanitize_title(get_the_title());
			$date = get_field('date', false, false);
			$date = new DateTime($date);
			$year = $date->format('Y');

			?>	
	
			<div class='margin-xl'> <!--containing div for timeline gorilla -->
			
			
				<div <?php post_class('preview_content')?> >
				<h3 class='margin-none aligncenter text-center year'><?php echo $year ?></h3>
					<div class='img-container margin-sm'>
						<img src="<?php the_field('featured_image')?>">
					</div>
					
					<h4 class='margin-xs aligncenter text-center'><?php the_title() ?></h4>
					<div class='summary aligncenter text-center margin-md'>
						<?php the_field('summary'); ?>
					</div>
					<button class='btn btn-default aligncenter margin-md' data-toggle='modal' data-target='#<?php echo($slug); ?>'>
						Read More
					</button>
				</div>
			</div>



			<?php ob_start(); /* Captures HTML for modal for later output */?> 
				<div id='<?php echo($slug); ?>' class='modal fade' role='dialog'>
					<div class="modal-dialog modal-full">
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
			<?php $modal_html .= ob_get_clean(); 

		endforeach;
		wp_reset_postdata();

	endif;

	?>
	</div> <!-- Timeline -->

	<?php echo($modal_html); ?>

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
    	wp_enqueue_style("timeline-gorilla", '/wp-content/plugins/MPD150-Timeline/js/timeline-gorilla/dist/themes/timeline-gorilla.theme-4.css');
	}
}

add_action("wp_enqueue_scripts", "timeline_scriptsandstyles");