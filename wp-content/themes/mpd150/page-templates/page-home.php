<?php
/*
Template Name: Homepage
*/

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area homepage-content" id="primary">

				<main class="site-main" id="main" role="main">
					<div id='main-heading-container'>
						<h1 class="main-heading text-center">
							MPD150
						</h1>
						<h2 id='tagline' class='text-center'> 
							A people's project evauluating policing 
						</h2>
						<p> 
							MPD150 is a community-based initiative challenging the narrative that police exist to protect and serve. By researching the Minneapolis Police Department’s history, reviewing current practices, and mapping responsible alternatives, we are committed to pursuing a police-free future.  
						</p>
					</div>
					<div id='learn-more' class='text-center'>
						<h2>
							Learn More
						</h2>
					</div>
					<h2> News </h2>
					<?php masterslider(1);?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
