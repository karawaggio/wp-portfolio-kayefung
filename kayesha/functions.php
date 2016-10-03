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
    add_image_size( 'kayesha-slider', 1140, 550, true );
    add_image_size( 'kayesha-thumbnail', 750, 500, true );
    add_image_size( 'kayesha-thumbs', 170, 170, true );
    add_image_size( 'custom-size', 220, 220, array( 'right', 'top' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kayesha' ),
        'footer' => esc_html__( 'Footer Menu', 'kayesha' ),
        'socialmenu' => esc_html__( 'Social Menu', 'kayesha' ),
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

    wp_enqueue_style('kayesha-googlefonts', 'https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans:400,700');

    wp_enqueue_style( 'kayesha-fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
          
    wp_enqueue_style( 'kayesha-fontawesome-cloud', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');   

	wp_enqueue_script( 'kayesha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kayesha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if( is_front_page() || is_page('portfolio') ) {
        wp_enqueue_style('kayesha-flexslider', get_template_directory_uri() . '/css/flexslider.css');
        wp_enqueue_script('kayesha-flexscript', get_template_directory_uri(). '/js/jquery.flexslider-min.js', array('jquery'), '', false );
        wp_enqueue_script('kayesha-flexsettings', get_template_directory_uri(). '/js/flexslider-settings.js', array('kayesha-flexscript'), '20160929', false);
      }  
         
   // if( is_page_template('archive-portfolio') ) {
        wp_enqueue_style('kayesha-flexslider', get_template_directory_uri() . '/css/flexslider.css');
        wp_enqueue_script('kayesha-flexscript', get_template_directory_uri(). '/js/jquery.flexslider-min.js', array('jquery'), '', false );
        wp_enqueue_script('kayesha-flexportfolio', get_template_directory_uri(). '/js/flexslider-portfolio.js', array('kayesha-flexscript'), '20160929', false);
      // }          


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
    //FAQ CPT (Custom Post Types)

        $labels = array(
            'name'               => _x( 'FAQ', 'post type general name' ),
            'singular_name'      => _x( 'FAQ', 'post type singular name'),
            'menu_name'          => _x( 'FAQ', 'admin menu' ),
            'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'FAQ' ),
            'add_new_item'       => __( 'Add New FAQ' ),
            'new_item'           => __( 'New FAQ' ),
            'edit_item'          => __( 'Edit FAQ' ),
            'view_item'          => __( 'View FAQ' ),
            'all_items'          => __( 'All FAQ' ),
            'search_items'       => __( 'Search FAQ' ),
            'parent_item_colon'  => __( 'Parent FAQ:' ),
            'not_found'          => __( 'No FAQ found.' ),
            'not_found_in_trash' => __( 'No FAQ found in Trash.' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'faq' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon'          => 'dashicons-info',
        );
        register_post_type( 'faq', $args );

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
            'supports'           => array( 'title','thumbnail' ),
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
            'edit_item'          => __( 'Edit Testimonial' ),
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
            'supports'           => array( 'editor' ),
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

function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Hello ', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
    }
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

//Change Excerpt read More
function kayesha_excerpt_more( $more ) {
    return '<a class="read-more" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'excerpt_more', 'kayesha_excerpt_more' );

//Change the length of the excerpt
function mindset_excerpt_length( $length ) {
        return 0;
}
add_filter( 'excerpt_length', 'kayesha_excerpt_length', 999 );
