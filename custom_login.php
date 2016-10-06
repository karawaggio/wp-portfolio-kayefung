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

        body.login .button-primary {
            float: right;
            background: #B5A4D1;
            border: 0;
            /*background: #0085ba;*/
            /*border-color: #0073aa #006799 #006799;*/
            -webkit-box-shadow: none;
            box-shadow: none;
            color: #fff;
            text-decoration: none;
            text-shadow: none;
        }

        body.login .button-primary:hover {
            background: #D1CEE9;
        }

        
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'kayesha_login_logo' );

//change login logo url
function kayesha_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'kayesha_login_logo_url' );

?>