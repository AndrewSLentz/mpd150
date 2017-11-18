<?php

require( get_stylesheet_directory().'/header_home.php' );

$container = get_theme_mod( 'understrap_container_type' );
?>






								<h3 id='tagline' class='text-center'><strong>
									<?php the_field('tagline') ?>
								</strong></h3>
							</div>
							<div id='learn-more-container'>
								<h2 id ='learn-more'>Learn More</h2>
								<div class='learn-more-tri aligncenter text-center'><img src='/wp-content/themes/mpd150/img/tri.svg'></div>
							</div>

					</div>
					</div>

						<div class="wrapper" id="full-width-page-wrapper">
							<div class="<?php echo esc_attr( $container ); ?>" id="content">
								<div class="row nopadding">
									<div class="col-md-12 content-area homepage-content" id="primary">
										<main class="site-main" id="main" role="main">
											<div id='main-heading-container'>




						<div class='row justify-content-center color1'>
							<div class='col-12 col-md-10'>
								<h1 id='report-title' class='margin-sm'><?php the_field('report_title') ?> </h1>
								<img id= 'report-title-img' src='<?php the_field('report_image') ?>' class="col-10 col-md-8 col-lg-4 margin-sm aligncenter border-black padding-none">
								<p class='aligncenter text-center trans-white'>
									<?php the_field('report_summary') ?>
								</p>
								<div id='read-the-report' class='text-center'>
									<button type='button' class='btn btn-default col-12 col-lg-6 margin-lg'>
										<h3 class='margin-none'>Read the Report</h3>
									</button>
								</div>
							</div>
						</div>
						<div class='row justify-content-center color3'>
							<div class='col-12 col-md-10'>
								<h1 class='margin-xs'> News </h1>
								<div id='news-slider' class='margin-none'>
									<?php masterslider(1);?>
								</div>
							</div>
						</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
