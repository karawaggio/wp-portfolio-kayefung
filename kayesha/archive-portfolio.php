<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kayesha
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		

			<header class="page-header">
				<h1 class="page-title">My Portfolio</h1>
			</header><!-- .page-header -->

<div class="wrapper-slider">
		<!-- Main  -->             
		<section class="slider">
		       <div id="slider" class="flexslider slider-portfolio main-container">
		          <ul class="slides">
                        <?php
                          $args = array (
                                          'post_type' => 'portfolio',
                                          'posts_per_page' => -1
                                           );

                          $portfolio = new WP_Query($args);


                          if($portfolio->have_posts()){
                          	while($portfolio->have_posts()){
                          		$portfolio->the_post();
                          		 echo "<li>";
                          	    //display images, if exists
                          		the_post_thumbnail('large');
                          		 echo " </li>";
                          	}//end while
                          	wp_reset_postdata(); 
                          }//end if                      
                          ?>
                     
                    </ul>
                </div><!-- .flexslider -->
            

                <!-- thumbnails navigation under main slider-portfolio -->
 				<div id="carousel" class="flexslider slider-portfolio">
		          <ul class="slides">
                        <?php
                          $args = array (
                                          'post_type' => 'portfolio',
                                          'posts_per_page' => -1
                                           );

                          $portfolio = new WP_Query($args);


                          if($portfolio->have_posts()){
                          	while($portfolio->have_posts()){
                          		$portfolio->the_post();
                          		 echo "<li>";
                          	    //display images, if exists
                          		the_post_thumbnail('thumbnail');
                          		 echo " </li>";
                          	}//end while
                          	wp_reset_postdata(); 
                          }//end if                      
                          ?>
                     
                    </ul>
                  </div><!-- .flexslider -->

         </section> <!-- .slider -->
</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
