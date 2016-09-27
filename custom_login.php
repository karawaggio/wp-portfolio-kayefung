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
function kayesha_login_logo() { ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url( <?php echo plugins_url( '../uploads/2016/09/kaye-logo-4.png' , __FILE__ );?> );
            background-size: 300px auto;
            width: 100%;
            height: 110px;
        }

        body.login {
		  /*background: #B5A4D1;*/
		  background: #D1CEE9;
		  background-repeat: no-repeat;
		  background-attachment: fixed;
		  background-position: center;
		}
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'kayesha_login_logo' );
?>