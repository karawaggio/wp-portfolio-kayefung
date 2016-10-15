<?php
/**
 * Kayesha functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kayesha
 */

if ( ! function_exists( 'kayesha_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kayesha_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kayesha, use a find and replace
	 * to change 'kayesha' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kayesha', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'kayesha' ),
        'footer' => esc_html__( 'Footer Menu', 'kayesha' ),
        'socialheader' => esc_html__( 'Social Header Menu', 'kayesha' ),
        'mainsocialmenu' => esc_html__( 'Social Main Menu', 'kayesha' ),
        'socialfooter' => esc_html__( 'Social Footer Menu', 'kayesha' ),
        'blogmenu' => esc_html__( 'Blog Menu', 'kayesha' ),
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

	
}
endif;
add_action( 'after_setup_theme', 'kayesha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kayesha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kayesha_content_width', 640 );
}
add_action( 'after_setup_theme', 'kayesha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

// add widgets function here

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue-function.php';

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

/**
 * Custom Post Types and Custom Taxonomies for this theme
 */
require get_template_directory() . '/inc/cpt-taxonomies.php';

/**
 * customize tiny mce/ wysiwyg editor 
 */
require get_template_directory() . '/inc/tinymce-customize.php';

/**
 * customize dashboard and admin menus
 */
require get_template_directory() . '/inc/dashboard-admin.php';

/**
 * customize excerpt
 */
require get_template_directory() . '/inc/excerpt.php';

/**
 * customize favicon
 */
require get_template_directory() . '/inc/favicon.php';

/**
 * Return menu to the search.php page
 */
require get_template_directory() . '/inc/search-menu.php';



//Remove 'Category' from Category Page Title
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );
    }
    return $title;

});


// remove placeholder text on search bar
function tachp_search_form($html) {

    $html = str_replace('placeholder="Search ', 'placeholder="', $html);

    return $html;
}
add_filter('get_search_form', 'tachp_search_form');


//change placeholder text in Testimonials title  to author instead of ACF
function testimonials_change_default_title( $title ) {
    $screen = get_current_screen();
    if( isset( $screen->post_type ) ) {
        if ( 'testimonial' == $screen->post_type ) {
            $title = 'Compliment Author';
        }
    }
    return $title;
}
add_filter( 'enter_title_here', 'testimonials_change_default_title' );