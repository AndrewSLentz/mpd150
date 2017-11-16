<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>


<html <?php language_attributes(); ?>>
<head>
				<?php

		if (is_page('4655')) {
					function my_kses_post( $value ) {

				// is array
				if( is_array($value) ) {

					return array_map('my_kses_post', $value);

				}


				// return
				return wp_kses_post( $value );

			}


			// Loading form submit code
			acf_form_head();
		}
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Karma|Rubik" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class='toprow row justify-content-center color6'>
		<div class="wrapper-fluid wrapper-navbar col-10" id="wrapper-navbar">

			<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
			'understrap' ); ?></a>

			<nav class="navbar navbar-expand-md">

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>

					<button class="navbar-toggler aligncenter" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new WP_Bootstrap_Navwalker(),
						)
					); ?>

				<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- .wrapper-navbar end -->
	</div>
	<div class='row justify-content-center main-heading-row' >
			<h1 class="main-heading text-center">
				MPD150
			</h1>
	</div>
