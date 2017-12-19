<?php


get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row toprow">

			<div class="col-md-12 content-area homepage-content" id="primary">

				<main class="site-main" id="main" role="main">

						<div class='row justify-content-center color4'>
							<div class='col-12 col-md-12 col-lg-12'>
								<div class='text-center'>
									<h1 class='aligncenter d-inline-block trans-white'><?php the_field('report_title') ?></h1>
								</div>
								<div class= 'col-12 aligncenter text-left margin-lg trans-white'>
									<?php the_field('report_summary') ?>
									<h3 class='margin-none aligncenter font-weight-light'><a href="http://www.mpd150.com/wp-content/uploads/MPD150_Report.pdf" target="_blank" title="MPD150 Report Download Link">Download the Report as PDF >></a></h3>
								</div>
							</div>
							<div id='overview-container' class='col-12 nopadding color3'>
								<div class='row'>
									<div class='col-12 col-md-4'>
										<div class='text-center margin-xs'>
											<h2 class="d-inline-block trans-white">Past</h2>
										</div>
										<img src='<?php the_field('past_image') ?>' class='border-black margin-md'>
										<div class='trans-white'>
											<p><?php the_field('past_summary') ?></p>
											<h4 class='text-left'><a href='/past' class='font-black'>View History Section ></a></h4>
										</div>
									</div>
									<div class='col-12 col-md-4'>
										<div class='text-center margin-xs'>
											<h2 class="d-inline-block trans-white">Present</h2>
										</div>
										<img src='<?php the_field('present_image') ?>' class='border-black margin-md'>
										<div class='trans-white'>
											<p><?php the_field('present_summary') ?></p>
											<h4 class='text-left'><a href='/present' class='font-black'>View Present Section ></a></h4>
										</div>
									</div>
									<div class='col-12 col-md-4 margin-xl'>
										<div class='text-center margin-xs'>
											<h2 class="d-inline-block trans-white">Future</h2>
										</div>
										<img src='<?php the_field('future_image') ?>' class='border-black margin-md'>
										<div class='trans-white'>
											<p><?php the_field('future_summary') ?></p>
											<h4 class='text-left'><a href='/future' class='font-black'>View Future Section ></a></h4>
										</div>
									</div>
								</div>
								
							</div>

						</div>
						<div class='row justify-content-center color1'>
							<div class='col-12 col-md-12 col-lg-12'>
								<div class= 'col-12 aligncenter text-left margin-lg trans-white'>
									<?php the_field('bottom_text_field') ?>
								</div>
							</div>
						</div>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
