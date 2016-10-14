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

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'kayesha_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
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

// function kayesha_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'kayesha' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'kayesha' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'kayesha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kayesha_scripts() {
	wp_enqueue_style( 'kayesha-style', get_stylesheet_uri() );

    wp_enqueue_style('kayesha-googlefonts', 'https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans:400,700');

    wp_enqueue_style('kayesha-googlefonts-more', 'https://fonts.googleapis.com/css?family=Catamaran:400,700|Heebo:400,700|Yantramanav');
    
    wp_enqueue_style( 'kayesha-fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
          
    wp_enqueue_style( 'kayesha-fontawesome-cloud', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');   

	wp_enqueue_script( 'kayesha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kayesha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'back-to-top-button', get_template_directory_uri() . '/js/topbutton.js', array( 'jquery' ));

            
    if( is_front_page() ) {
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
//require get_template_directory() . '/inc/custom-header.php';

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
             'exclude_from_search' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'faq' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'editor' ),
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
             'exclude_from_search' => false,
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
             'exclude_from_search' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'testimonials' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'editor', 'title' ),
            'menu_icon'          => 'dashicons-format-chat',
        );
        register_post_type( 'testimonial', $args );
    }
    add_action( 'init', 'kayesha_register_custom_post_types' );


    // function kayesha_rewrite_flush() {

    // 	//this should match your CPT registration name
    //     kayesha_register_custom_post_types();
    //     flush_rewrite_rules();
    // }
    // register_activation_hook( __FILE__, 'kayesha_rewrite_flush' );

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
            'public'             => true,
            'publicly_queryable' => true,
             'exclude_from_search' => false,
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
function kayesha_excerpt_length( $length ) {
        return 0;
}
add_filter( 'excerpt_length', 'kayesha_excerpt_length', 999 );


//Remove 'Category' from Category Page Title
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});


function rc_add_cpts_to_search($query) {

    // Check to verify it's search page
    if( is_search() ) {
        // Get post types
        $post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
        $searchable_types = array();
        // Add available post types
        if( $post_types ) {
            foreach( $post_types as $type) {
                $searchable_types[] = $type->name;
            }
        }
        $query->set( 'post_type', $searchable_types );
    }
    return $query;
}
add_action( 'pre_get_posts', 'rc_add_cpts_to_search' );


// remove placeholder text on search bar
function tachp_search_form($html) {

    $html = str_replace('placeholder="Search ', 'placeholder="', $html);

    return $html;
}
add_filter('get_search_form', 'tachp_search_form');


//tinyMCE base line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
    function base_extended_editor_mce_buttons($buttons) {
        // The settings are returned in this array. Customize to suite your needs.
        return array(
            'bold', 'italic','bullist', 'numlist', 'link', 'unlink', 'blockquote', 'outdent', 'indent', 'charmap', 'removeformat', 'spellchecker', 'fullscreen', 'wp_help'
        );
        /* WordPress Default
        return array(
            'bold', 'italic', 'strikethrough', 'separator', 
            'bullist', 'numlist', 'blockquote', 'separator', 
            'justifyleft', 'justifycenter', 'justifyright', 'separator', 
            'link', 'unlink', 'wp_more', 'separator', 
            'spellchecker', 'fullscreen', 'wp_adv'
        ); */
    }
    add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}

// TinyMCE: Second line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons_2') ){
    function base_extended_editor_mce_buttons_2($buttons) {
        // The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
        return array('underline', 'justifyfull','pastetext', 'pasteword', 'removeformat','undo', 'redo', 'wp_help');
        /* WordPress Default
        return array(
            'formatselect', 'underline', 'justifyfull', 'forecolor', 'separator', 
            'pastetext', 'pasteword', 'removeformat', 'separator', 
            'media', 'charmap', 'separator', 
            'outdent', 'indent', 'separator', 
            'undo', 'redo', 'wp_help'
        ); */
    }
    add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}
//remove customize submenu from the admin sidebar
// function as_remove_menus () {
//       // remove_menu_page('upload.php'); //hide Media
//        remove_menu_page('link-manager.php'); //hide links
//       // remove_submenu_page( 'edit.php', 'edit-tags.php' ); //hide tags
//        global $submenu;
//         // Appearance Menu
//         unset($submenu['themes.php'][6]); // Customize
// }
// add_action('admin_menu', 'as_remove_menus');


//remove customize 
function remove_customize() {
    $customize_url_arr = array();
    $customize_url_arr[] = 'customize.php'; // 3.x
    $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
    $customize_url_arr[] = $customize_url; // 4.0 & 4.1
    if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-header'; // 4.0
    }
    if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-background'; // 4.0
    }
    foreach ( $customize_url_arr as $customize_url ) {
        remove_submenu_page( 'themes.php', $customize_url );
    }
}
add_action( 'admin_menu', 'remove_customize', 999 );


//remove all default dashboard widgets
function kayesha_remove_dashboard_widgets() {
remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );// Incoming Links
remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );// Plugins
remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );// WordPress blog
remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );// WordPress News
remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );// Quick Press
remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );// Recent Drafts
remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );// Comments
remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );// Right Now
remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//Activity
};
add_action( 'wp_dashboard_setup', 'kayesha_remove_dashboard_widgets' );
remove_action( 'welcome_panel', 'wp_welcome_panel' );


//add custom widgets to dash board - welcome and tutorials
function kayesha_add_dashboard_widgets() {
wp_add_dashboard_widget( 'kayesha_dashboard_welcome', 'Welcome', 'kayesha_add_welcome_widget'
);
wp_add_dashboard_widget( 'kayesha_dashboard_tutorials', 'Tutorials', 'kayesha_add_tutorials_widget' );
}


function kayesha_add_welcome_widget(){
    echo '<h1>Welcome Kayesha </h1>';
    echo '<p> Here is the custom website for KayeFung MakeUp Artistry</p>';
}


function kayesha_add_tutorials_widget() {
   
    echo '<h2>PDF Tutorials : </h2>';
    echo '<ul>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/Tutorial-Homepage-Footer.pdf" target="_blank">Homepage and footer explained in detail</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/Tutorial-About.pdf" target="_blank">About Page</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/Tutorial-Services.pdf" target="_blank">Services Page</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/Tutorial-Portfolio.pdf" target="_blank">Portfolio Page</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/Tutorial-Blog.pdf" target="_blank">Blog Page</a></li>';
     echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/Tutorial-Contact.pdf" target="_blank">Contact Page</a></li>';
      echo '</ul>';

    echo '<h2>Video Tutorials :  </h2>';    
    echo '<ul>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/addblog" target="_blank">How to add/change/delete a post on the blog</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/editportfolio" target="_blank">How to add/change/delete  a photo on the portfolio</a></li>'; 
    echo '<li><a href="http://kayefung.htpwebdesign.ca/addserviceorder" target="_blank">How to add/change and order services</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/deleteservice" target="_blank">How to delete a service</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/edit-testimonials" target="_blank">How to add/change/delete testimonials</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/wp-content/uploads/2016/10/edit-contacts-faq.mp4" target="_blank">How to add/change contact info and faq</a></li>';
    echo '<li><a href="http://kayefung.htpwebdesign.ca/special-message" target="_blank">How to add/change a special message</a></li>';
    echo '</ul>';
}
add_action( 'wp_dashboard_setup', 'kayesha_add_dashboard_widgets' );


//Add Favicon
function kayesha_favicon() { 
//echo '<link href="'. get_template_directory_uri().'/favicon.ico" rel="shortcut icon" type="image/x-icon">';

echo '<!-- For iPad with high-resolution Retina display running iOS >= 7: -->';
echo '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="'. get_template_directory_uri().'/images/favicon-152.png">';
echo '<!-- For iPhone with high-resolution Retina display running iOS >= 7: -->';
echo '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="'. get_template_directory_uri().'/images/favicon-120.png">';
echo '<!-- Chrome / Firefox / Opera -->';
echo '<link rel="icon" href="'. get_template_directory_uri().'/images/favicon-76.png">';
echo '<!-- for IE up to IE9 -->';
echo '<!--[if IE]>';
echo '<link rel="shortcut icon" href="'. get_template_directory_uri().'/images/favicon.ico">';
echo '<![endif]-->';
echo '<!-- for IE10 and up -->';
echo '<meta name="msapplication-TileImage" content="'. get_template_directory_uri().'/images/favicon-144.png">';
echo '<meta name="msapplication-TileColor" content="#000000">';
 }
add_action('wp_head', 'kayesha_favicon');


//change name of Menu card plugin to services
function rename_menu_card( $translated, $original, $domain ) {
$strings = array(
    'Menu Card' => 'Services List',
    // 'Custom Header' => 'Custom Stall'
);

if ( isset( $strings[$original] ) && is_admin() ) {
    $translations = &get_translations_for_domain( $domain );
    $translated = $translations->translate( $strings[$original] );
}

  return $translated;
}

add_filter( 'gettext', 'rename_menu_card', 10, 3 );


function my_text_strings( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
    case 'Menu Card' :
        $translated_text = __( 'Service', 'Menu Card' );
        break;
}
return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );





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