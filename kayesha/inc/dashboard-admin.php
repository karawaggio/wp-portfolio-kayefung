<?php

//remove customize from admin 
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



//replace howdy on top admin bar
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Hello ', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
    }
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


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



/*
*  Customize Dashboard
*/

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
