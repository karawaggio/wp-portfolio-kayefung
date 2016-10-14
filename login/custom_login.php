<?php
/*
Plugin Name: Custom Wordpress Login
Plugin URI: http://kayefung.htpwebdesign.ca/
Description: This plugin customizes the WordPress login screen.
Version: 1.0
Author: Arlene Ata, Greg Voth, Sergey Karavaev
Author URI: 
License: GPLv2
*/

// add a new logo to the login page
function kayesha_login_logo() { 
   
    wp_enqueue_style( 'kayesha_custom_login', plugin_dir_url( __FILE__ ) . '/custom-login-styles.css', array(), '20161013' );

}

add_action( 'login_enqueue_scripts', 'kayesha_login_logo' );

//change login logo url
function kayesha_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'kayesha_login_logo_url' );

?>