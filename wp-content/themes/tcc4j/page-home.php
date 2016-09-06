<?php
/**
 * Front Page Template
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCC4J
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class='section1'>
				<div class='featured-post'>

					<?php 
					$args = array(
						'posts_per_page' => 1,
						'category_name' => 'featured',
						'orderby' => 'post_date',
						'order' => 'DESC' );

					$the_query = new WP_Query( $args );
					

					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<a href="' . get_the_permalink() . '">'; 
						echo get_the_post_thumbnail();
						echo '<h2>' . get_the_title() . '</h2>';
						echo '<p>' . get_the_content() . '</p>';
						echo '</a>';
					}
					?>
				</div>

			</div>

			<div class='section2'>
				<div class='past-posts'>
					<?php 

					$args = array(
						'posts_per_page' => 3,
						'cat' => '-3',
						'orderby' => 'post_date',
						'order' => 'DESC' );

					$the_query = new WP_Query( $args );
					

					while ( $the_query->have_posts() ) {
						echo '<div class="post-container">';
							$the_query->the_post();
							echo get_the_post_thumbnail();
							echo '<h2>' . get_the_title() . '</h2>';
							
						echo '</div>';
					}
					?>
				</div>
			

			<div class='ally-posts'>
				<h1> Articles from other Groups </h1>
					<?php echo do_shortcode('[wp-rss-aggregator]');?>
			</div>

			</div>


		</main>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
