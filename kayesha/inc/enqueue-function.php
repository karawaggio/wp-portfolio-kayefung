<?php
/*
*   Enqueue scripts and styles to the Kayesha theme
*
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
