<?php
/*
Plugin Name: Upcoming events Plugin for Vlad's Site
Description: Site specific code changes to add events to sidebar
*/
/* Start Adding Functions Below this Line */


//Creates Event Type
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'events' ),
        'singular_name' => __( 'event')
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}




// Creates Upcoming events Widget
// Creating the widget 
class event_widget extends WP_Widget {
function __construct() {
parent::__construct(
// Base ID of your widget
'event_widget', 
// Widget name will appear in UI
__('Upcoming events', 'wpb_widget_domain'), 
// Widget description
array( 'description' => __( 'Widget for adding upcoming events', 'wpb_widget_domain' ), ) 
);
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
/*if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];*/
// This is where you run the code and display the output
?> <div class="upcoming-events">
	<h1> <a href='/events'>Upcoming Events </a></h1>
 <?php
$loop = new WP_Query( array( 
  'post_type' => 'event', 
  'posts_per_page' => 2, 
  'order' => 'ASC',
  'orderby' => 'meta_value',
  'meta_key' => 'start_date',
  'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
            array(
                'key' => 'start_date', // Check the start date field
                'value' => date("Y-m-d"), // Set today's date (note the similar format)
                'compare' => '>=', // Return the ones greater than today's date
                'type' => 'NUMERIC,' // Let WordPress know we're working with numbers
                )
            ), )); 
 while ( $loop->have_posts() ) : $loop->the_post(); 
 ?>
 	<?php
	 	$start_date= new DateTime(get_field('start_date', false, false));
    $start_date=$start_date->format('M jS, g');
	 	$end_date= new DateTime(get_field('end_date', false, false));
    $end_date=$end_date->format('ga');

   
 	?>
    <div class="event-details">
        <div class='text'>
        	<h2> <a href="<?php the_permalink(); ?>">
            <?php echo get_the_title();?> 
          </a></h2>
          <a href="<?php the_permalink(); ?>">
            <p> <?php echo $start_date; echo ' - '; echo $end_date; ; echo '<br>' . get_field('location');  ?> </p>
          </a>
        </div>
        <div class='img-container'>
        	<a href="<?php the_permalink(); ?>">
            <img src=' <?php echo get_field("featured_image"); ?> '>
          </a>	 
        </div>
        
    </div>

<?php endwhile; wp_reset_query(); ?>
</div>
<?php
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
No customization available
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here
// Register and load the widget
function wpb_load_widget() {
	register_widget( 'event_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
/* Stop Adding Functions Below this Line */
?>