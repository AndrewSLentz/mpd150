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
								<h3 id='tagline' class='text-center'><strong> 
									A people's project evaluating policing 
								</strong></h3>
								<h1 id='report-title' class='margin-sm'><strong>MPD150 Performance Review: Enough is Enough</strong></h1>
								<img id= 'report-title-img' src='/wp-content/uploads/2017/10/squad-car.jpg' class="col-10 col-md-8 col-lg-4 margin-sm aligncenter border-black padding-none">
								<p class='aligncenter text-center'>
									MPD150 is an independent community-based initiative to evaluate the first 150 years of the Minneapolis Police Department. Through historical investigation, interviews and research into viable alternatives we have produced a performance review that examines the department's past – its track record since 1867 including the failure of reform efforts; its present – its current practices and impact on community life; and the future – the necessity of dismantling its overbearing political and paramilitary power and the transfer of its resources into alternative models of community safety, well-being and resilience.
								</p>
								<div id='learn-more' class='text-center'>
									<button type='button' class='btn btn-default col-12 col-lg-6 margin-lg'>
										<h3 class='margin-none'>Read the Report</h3>
									</button>
								</div>
								<h2 class='margin-xs'> News </h2>
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
