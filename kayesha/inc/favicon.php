<?php

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