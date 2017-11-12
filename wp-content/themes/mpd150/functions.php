<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/* One-time PHP script for importing interview data from Dedoose export file */

if ( current_user_can( 'manage_options' ) ) {


   /* if( ! file_exists( get_template_directory() . '/inc/one-time/import_interview_excerpts.php' )); //name changes after script is run
   		echo "file DNE";
      	return;*/

/*    include get_template_directory() . '/inc/one-time/import_interview_excerpts.php';*/


}

define('ACF_EARLY_ACCESS', '5'); //allows upgrading to ACF 5

function pull_quote($atts=[],$content=null) {
	$content = "<span class='pull-quote'>" . $content . "</span>";
	return $content;
}

add_shortcode("pull_quote", "pull_quote");