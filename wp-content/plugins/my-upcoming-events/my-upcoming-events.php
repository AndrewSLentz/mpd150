<?php
/*
Plugin Name: Upcoming events Plugin for TCC4J Site
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


// Creates Custom Post Type
if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_events',
    'title' => 'Events',
    'fields' => array (
      array (
        'key' => 'field_58286b35aa5ce',
        'label' => 'Start Date',
        'name' => 'start_date',
        'type' => 'date_picker',
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
       array (
        'key' => 'field_58286d1c9ab07',
        'label' => 'Start Time',
        'name' => 'start_time',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_58286b76aa5d0',
        'label' => 'End Date',
        'name' => 'end_date',
        'type' => 'date_picker',
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
       array (
        'key' => 'field_58286d1c9ab08',
        'label' => 'End Time',
        'name' => 'end_time',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_58286b71aa5cf',
        'label' => 'Location',
        'name' => 'location',
        'type' => 'text',
        'instructions' => 'The name of the location, not the address, unless there is only an address.',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_58286d1c9ab09',
        'label' => 'Address',
        'name' => 'address',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_58286ba5aa5d1',
        'label' => 'Featured Image',
        'name' => 'featured_image2',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'event',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
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
    $start_date=$start_date->format('M jS');
	 	$end_date= new DateTime(get_field('end_date', false, false));
    $end_date=$end_date->format('M jS');

   
 	?>
    <div class="event-details">
        <div class='text'>
        	<h2> <a href="<?php the_permalink(); ?>">
            <?php echo get_the_title();?> 
          </a></h2>
          <a href="<?php the_permalink(); ?>">
            <p> <?php echo $start_date . ", " . get_field("start_time"); echo ' - '; 
            echo get_field("end_time");
            echo '<br>' . get_field('location').get_field('address');  ?> </p>
          </a>
        </div>
        <div class='img-container'>
        	<a href="<?php the_permalink(); ?>">
            <img src=' <?php echo get_field("featured_image2"); ?> '>
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