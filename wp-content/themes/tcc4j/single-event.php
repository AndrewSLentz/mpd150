<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCC4J
 */

get_header(); ?>

	<div id="primary" class="content-area generic-page">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
			?><div class='grey-background'><?php
				 	$start_date= new DateTime(get_field('start_date', false, false));
			    $start_date=$start_date->format('M jS, g');
				 	$end_date= new DateTime(get_field('end_date', false, false));
			    $end_date=$end_date->format('ga');

			   
			 	?>
			    <div class="event-details single">
			    	<div class='row'>
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
			        <div class='event-content'
					        <?php
						the_content();
						
						?>
					</div>
			</div><?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
?>