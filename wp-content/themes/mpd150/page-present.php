<?php

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area homepage-content" id="primary">

				<main class="site-main" id="main" role="main">

					<div class='row justify-content-center color4'>
						<div class='col-12 col-md-10 col-lg-10'>
							<h1> <?php the_title() ?></h1>
							<p class='aligncenter text-center margin-lg trans-white'><?php the_field('present_content') ?></p>		
						</div>
					</div>


					<?php echo do_shortcode('[interviews]');?>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
