<?php

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area homepage-content" id="primary">

				<main class="site-main" id="main" role="main">
					<div id='main-heading-container'>
						<div class='row justify-content-center'>
							<div class='col-12 col-md-10 col-lg-8'>
								<h1> <?php the_title() ?></h1>
								<p class='aligncenter text-center margin-lg'>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Elit scelerisque mauris pellentesque pulvinar pellentesque. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Elit scelerisque mauris pellentesque pulvinar pellentesque. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. In fermentum et sollicitudin ac orci phasellus egestas. Molestie ac feugiat sed lectus vestibulum </p>
								
							</div>
							<div class='timeline-container margin-xl'>
									<?php echo do_shortcode('[interviews]');?>
							</div>
						</div>
						
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
