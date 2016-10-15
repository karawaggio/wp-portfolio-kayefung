<?php
/**
 * create the Custom Post types and Custom Taxonomies
 */

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

//flushing for cpt inside functions.php 
function kayesha_rewrite_flush() {

    flush_rewrite_rules();
} 
add_action('after_swtich_theme', 'kayesha_rewrite_flush');

    
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


//include cpts to search
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