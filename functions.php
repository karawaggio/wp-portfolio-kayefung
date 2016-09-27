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
	add_theme_support( 'custom-background', apply_filters( 'kayesha_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
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
function kayesha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kayesha' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kayesha' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kayesha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kayesha_scripts() {
	wp_enqueue_style( 'kayesha-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kayesha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kayesha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kayesha_scripts' );

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

function kayesha_register_custom_post_types() {
    //SERVICES CPT (Custom Post Types)

        $labels = array(
            'name'               => _x( 'Services', 'post type general name' ),
            'singular_name'      => _x( 'Service', 'post type singular name'),
            'menu_name'          => _x( 'Services', 'admin menu' ),
            'name_admin_bar'     => _x( 'Service', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'service' ),
            'add_new_item'       => __( 'Add New Service' ),
            'new_item'           => __( 'New Service' ),
            'edit_item'          => __( 'Edit Service' ),
            'view_item'          => __( 'View Service' ),
            'all_items'          => __( 'All Services' ),
            'search_items'       => __( 'Search Services' ),
            'parent_item_colon'  => __( 'Parent Services:' ),
            'not_found'          => __( 'No services found.' ),
            'not_found_in_trash' => __( 'No services found in Trash.' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'services' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'editor' ),
            'menu_icon'          => 'dashicons-portfolio',
        );
        register_post_type( 'service', $args );

        //PORTFOLIO CPT (Custom Post Types)

        $labels = array(
            'name'               => _x( 'Portfolio', 'post type general name' ),
            'singular_name'      => _x( 'Portfolio', 'post type singular name'),
            'menu_name'          => _x( 'Portfolio', 'admin menu' ),
            'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'portfolio piece' ),
            'add_new_item'       => __( 'Add New Portfolio piece' ),
            'new_item'           => __( 'New Portfolio Piece' ),
            'edit_item'          => __( 'Edit Portfolio Piece' ),
            'view_item'          => __( 'View Portfolio' ),
            'all_items'          => __( 'All Portfolio' ),
            'search_items'       => __( 'Search Portfolio' ),
            'parent_item_colon'  => __( 'Parent Portfolio:' ),
            'not_found'          => __( 'No portfolio found.' ),
            'not_found_in_trash' => __( 'No portfolio found in Trash.' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'editor' ),
            'menu_icon'          => 'dashicons-format-gallery',
        );
        register_post_type( 'portfolio', $args );

        //Testimonials CPT (Custom Post Types)

        $labels = array(
            'name'               => _x( 'Testimonials', 'post type general name' ),
            'singular_name'      => _x( 'Testimonials', 'post type singular name'),
            'menu_name'          => _x( 'Testimonials', 'admin menu' ),
            'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'testimonials piece' ),
            'add_new_item'       => __( 'Add New Testimonials piece' ),
            'new_item'           => __( 'New Testimonials Piece' ),
            'edit_item'          => __( 'Edit Testimonials Piece' ),
            'view_item'          => __( 'View Testimonials' ),
            'all_items'          => __( 'All Testimonials' ),
            'search_items'       => __( 'Search Testimonials' ),
            'parent_item_colon'  => __( 'Parent Testimonials:' ),
            'not_found'          => __( 'No testimonials found.' ),
            'not_found_in_trash' => __( 'No testimonials found in Trash.' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'testimonials' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'editor' ),
            'menu_icon'          => 'dashicons-format-chat',
        );
        register_post_type( 'testimonial', $args );
    }
    add_action( 'init', 'kayesha_register_custom_post_types' );


    function kayesha_rewrite_flush() {

    	//this should match your CPT registration name
        kayesha_register_custom_post_types();
        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'kayesha_rewrite_flush' );

    // TAXONOMIES

    function kayesha_register_taxonomies() {
        // Add Partner Links taxonomy - hierarchical (like categories)
        // you can change the names in $labels, but not in $args;
        $labels = array(
            'name'              => _x( 'Service Types', 'taxonomy general name' ),
            'singular_name'     => _x( 'Service Type', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Service Types' ),
            'all_items'         => __( 'All Service Types' ),
            'parent_item'       => __( 'Parent Service Type' ),
            'parent_item_colon' => __( 'Parent Service Type:' ),
            'edit_item'         => __( 'Edit Service Type' ),
            'update_item'       => __( 'Update Service Type' ),
            'add_new_item'      => __( 'Add New Service Type' ),
            'new_item_name'     => __( 'New Service Type Name' ),
            'menu_name'         => __( 'Service Type' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menu'  => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'service-types' ),
        );
        register_taxonomy( 'service-type', array( 'service' ), $args );
    }
    add_action( 'init', 'kayesha_register_taxonomies', 0);
