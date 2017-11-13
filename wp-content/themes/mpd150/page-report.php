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
								<h1 class='aligncenter'>Enough is Enough</h1>
								<p class= 'col-12 aligncenter text-center margin-lg trans-white'>
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Elit scelerisque mauris pellentesque pulvinar pellentesque. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Elit scelerisque mauris pellentesque pulvinar pellentesque. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. In fermentum et sollicitudin ac orci phasellus egestas. Molestie ac feugiat sed lectus vestibulum 
								</p>
							</div>
							<div id='overview-container' class='col-12 nopadding color3'>
								<div class='row'>
									<div class='col-12 col-md-4'>
										<h2>Past</h2>
										<img src='/wp-content/uploads/2017/11/1934-strike-3.png' class='border-black margin-md'>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										<h4 class='alignleft'><a href='/history' class='font-black'>View History Section ></a></h4>
									</div>
									<div class='col-12 col-md-4'>
										<h2>Present</h2>
										<img src='/wp-content/uploads/2017/11/1934-strike-3.png' class='border-black margin-md'>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										<h4 class='alignleft'><a href='/present' class='font-black'>View Present Section ></a></h4>
									</div>
									<div class='col-12 col-md-4 margin-xl'>
										<h2>Future</h2>
										<img src="/wp-content/uploads/2017/11/1934-strike-3.png" class='border-black margin-md'>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
