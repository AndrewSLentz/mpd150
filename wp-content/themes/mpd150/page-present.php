<?php

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row color4">

			<div class="col-md-12 content-area homepage-content color4 justify-content-center" id="primary">

				<main class="site-main" id="main" role="main">

						<div class='aligncenter text-left margin-lg trans-white col-12 col-md-10'>
							<h1> <?php the_title() ?></h1>
							<?php the_field('present_summary') ?>
							<div class= 'report-button-container margin-lg'>
								<button class='btn-default btn read-more read'>Read More</button>
								<button class='btn-default btn view-feature'>View Interviews</button>
							</div>
							<div class='hidden full-content'><?php the_field('present_full_content') ?></div>
						</div>
				</main>
			</div>
		</div>
			<div class='row color3'>
				<div class='feature' style="background-color:transparent">
					
					<?php echo do_shortcode('[interviews]');?>
				</div>
			</div>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
