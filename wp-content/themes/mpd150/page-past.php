<?php

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row nopadding">

			<div class="col-md-12 content-area homepage-content color4" id="primary">

				<main class="site-main" id="main" role="main">
					<div id='main-heading-container'>
						<div class='row justify-content-center'>
							<div class='col-12 col-md-10 col-lg-10'>
								<div class='aligncenter text-left margin-lg trans-white'>
									<h1> <?php the_title() ?></h1>
									<?php the_field('past_summary') ?>
									<div class= 'report-button-container margin-lg'>
										<button class='btn-default btn read-more read'>Read More</button>
										<button class='btn-default btn view-feature'>View Timeline</button>
									</div>
									<div class='hidden full-content'><?php the_field('past_full_content') ?></div>
								</div>
							
								

								<div class='feature timeline-container margin-xl'>
									<h1>Timeline</h1>
									<?php echo do_shortcode('[timeline]');?>
								</div>
							</div>
						</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
