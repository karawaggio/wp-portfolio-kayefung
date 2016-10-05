<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kayesha
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>KayeFung | Artistry</title>
<meta name="description" content="KayeFung Artustry by Kayesha Fung is a website about makeup, beauty and fashion"/>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link href= rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kayesha' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<div class="container">

			<section class="inner-head-container">

				<div class="logo">
					<?php 
				        if (function_exists ('get_field')){
				          if (get_field('logo_kayesha', 18)){
				            $logo = get_field('logo_kayesha', 18);
				            //var_dump($logo);
				            if ($logo){ 
				              //variables to show the image with choosen size
				              $url = $logo['url'];
				              $alt = $logo['alt'];
				              $home = home_url();

				              $size = 'large';
				              $mylogo = $logo['sizes'][ $size ];
				              $width = $logo['sizes'][ $size . '-width' ];
				              $height = $logo['sizes'][ $size . '-height' ];

				              echo '<a href="';
				              echo esc_url( $home );
				              echo '"><img src="';
				              echo $mylogo;
				              echo '" alt="';
				              echo $alt;
				              echo '" width="';
				              echo $width;
				              echo '" height="';
				              echo $height;
				              echo '"></a>';
				               
				            }
				          }
				        }
		      		?>
		      		<a href=""><img src=""></a>
	      		</div><!-- end of .logo -->

				<nav id="site-navigation" class="main-navigation" role="navigation">

					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e( 'Menu', 'kayesha' ); ?>
					</button>

					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation .main-navigation-->

				<div class="searchbar-social-nav">
					<nav id="social-navigation" class="social-navigation">
					    <?php wp_nav_menu( array( 'theme_location' => 'socialmenu') ); ?>
				    </nav>

					<div class="searchbar">
						<?php get_search_form(); ?>
					</div>
				</div> <!-- end .searchbar-social-nav-->
			</section> <!--end of .inner-head-container -->



		</div><!-- end of container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
