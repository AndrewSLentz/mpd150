<?php


get_header(); ?>

	<div id="primary" class="content-area generic-page">
		<main id="main" class="site-main" role="main">
			<div class='grey-background events-list'>
				<h1 class='page-title'><?php the_title(); ?> </h1>

							<?php
							$loop = new WP_Query( array( 
				  'post_type' => 'event', 
				  'posts_per_page' => 10, 
				  'order' => 'DESC',
				  'orderby' => 'meta_value',
				  'meta_key' => 'start_date',
				   'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
            array(
                'key' => 'start_date', // Check the start date field
                'value' => date("Y-m-d"), // Set today's date (note the similar format)
                'compare' => '>=', // Return the ones greater than today's date
                'type' => 'NUMERIC,' // Let WordPress know we're working with numbers
                )
            ),
				   )); 
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
				            <img src=' <?php echo get_field("featured_image2"); ?> '>
				          </a>	 
				        </div>
				        
				    </div>

				<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
