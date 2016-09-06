<?php
/**
 * TCC4J functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TCC4J
 */

if ( ! function_exists( 'tcc4j_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tcc4j_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TCC4J, use a find and replace
	 * to change 'tcc4j' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tcc4j', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tcc4j' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tcc4j_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'tcc4j_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tcc4j_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tcc4j_content_width', 640 );
}
add_action( 'after_setup_theme', 'tcc4j_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tcc4j_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tcc4j' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tcc4j' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tcc4j_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tcc4j_scripts() {
	wp_enqueue_style( 'tcc4j-style', get_stylesheet_uri() );

	wp_enqueue_style( 'tcc4j-custom', get_template_directory_uri() . '/custom.css' );

	wp_enqueue_script( 'tcc4j-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tcc4j-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tcc4j_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function theme_customizer( $wp_customize ) {

    $wp_customize->add_section( 'tcc4j_logo_section' , array(
    'title'       => __( 'Logo', 'tcc4j' ),
    'priority'    => 30,
    'description' => 'Upload a logo',
    ) );

    $wp_customize->add_setting( 'tcc4j_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tcc4j_logo', array(
    'label'    => __( 'Logo', 'tcc4j' ),
    'section'  => 'tcc4j_logo_section',
    'settings' => 'tcc4j_logo',
) ) );

}
add_action( 'customize_register', 'theme_customizer' );


