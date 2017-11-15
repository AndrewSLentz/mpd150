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
							<div class='col-12 col-md-10 col-lg-8'>
								<h1 class='aligncenter'><?php the_field('report_title') ?></h1>
								<div class= 'col-12 aligncenter text-center margin-lg trans-white'>
									<?php the_field('report_summary') ?>
								</div>
							</div>
							<div id='overview-container' class='col-12 nopadding color3'>
								<div class='row'>
									<div class='col-12 col-md-4'>
										<h2>Past</h2>
										<img src='<?php the_field('past_image') ?>' class='border-black margin-md'>
										<p><?php the_field('past_summary') ?></p>
										<h4 class='alignleft'><a href='/history' class='font-black'>View History Section ></a></h4>
									</div>
									<div class='col-12 col-md-4'>
										<h2>Present</h2>
										<img src='<?php the_field('present_image') ?>' class='border-black margin-md'>
										<p><?php the_field('present_summary') ?></p>
										<h4 class='alignleft'><a href='/present' class='font-black'>View Present Section ></a></h4>
									</div>
									<div class='col-12 col-md-4 margin-xl'>
										<h2>Future</h2>
										<img src='<?php the_field('future_image') ?>' class='border-black margin-md'>
										<p><?php the_field('future_summary') ?></p>
										<h4 class='alignleft'><a href='/future' class='font-black'>View Future Section ></a></h4>
									</div>
								</div>
								<h3 class='margin-xxl aligncenter font-weight-light trans-white'><a>Download the Report as PDF >></a></h3>
							</div>

						</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
