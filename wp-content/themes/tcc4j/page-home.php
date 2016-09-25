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
							echo '<a href="' . get_the_permalink() . '">';
							echo get_the_post_thumbnail();
							echo '<h3>' . get_the_title() . '</h3>';
							echo '</a>';
							
						echo '</div>';
					}
					?>
				</div>
			

			<div class='ally-posts'>
					<div class='rss_container'>
						<h2> <a href='https://twincitiesgdc.org/'>Twin Cities GDC </a></h2>
						<?php RSSImport(5, 'https://twincitiesgdc.org/feed/'); ?>
					</div>
					<div class='rss_container'>
						<h2> <a href='http://jimcrownorth.com/'> Jim Crow North </a></h2>
						<?php RSSImport(5, 'http://jimcrownorth.com/feed/'); ?>
					</div>
			</div>

			</div>


		</main>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
