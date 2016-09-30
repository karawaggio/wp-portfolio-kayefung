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

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		<!-- <section class="portfolio-slider"> -->
               
		<section class="slider">
		        <div id="slider" class="flexslider slider-portfolio">
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
                </div><!-- .slider -->
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
                          		 echo "<li data-thumb='";
                          		 the_post_thumbnail('thumbnail');
                          		 echo "'>";
                          	    //display images, if exists
                          		the_post_thumbnail('medium');
                          		 echo " </li>";


                          	}//end while
                          	wp_reset_postdata(); 
                          }//end if

                        
                          ?>
                     
                    </ul>
                  </div><!-- .flexslider -->
                </div><!-- .slider -->


            </section> <!-- front-slider -->



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
