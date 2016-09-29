<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kayesha
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="home-page">   
			<?php
			while ( have_posts() ) : the_post();
				the_post_thumbnail('medium');
				get_template_part( 'template-parts/content', 'notitle' );
			?>
			 </section><!--.home-page  -->
	
  
				<div class="split-wrapper">
            	<section class="about">
	                <h2>About</h2>
	               <?php if (function_exists('get_field')){

						echo "<div class='about-image'>";

						//show image with ID return value : able to display a certain size 
						$about_image = get_field('about_feature_image');							
						$size = 'medium';
							// echo '<pre>';
							// var_dump( $about_image );
							// echo '</pre>';
						if ($about_image){
							echo wp_get_attachment_image( $about_image, $size);
						}
					
						echo "</div>";

						echo "<div class='about-info'>";
						if(get_field('about') ){
							the_field('about');
						}
						echo "</div>";

					}?>
		            </section><!--.about  -->
		            
		            <section class="services">
		                <h2>Services</h2>
		                 <?php  if (function_exists('get_field')){
		                 	echo "<div class='service-image'>";

							//show image with ID return value : able to display a certain size 
							$services_image = get_field('services_feature_image');							
							$size = 'medium';
								// echo '<pre>';
								// var_dump( $about_image );
								// echo '</pre>';
							if ($about_image){
								echo wp_get_attachment_image( $services_image, $size);
						}
					
						echo "</div>";


						echo "<div class='about-info'>";
		                if(get_field('services')){
			                the_field('services');
		                    }
		                } 
		               echo "</div>";?>

		            </section><!--.servcices  -->
	           

           
              <?php endwhile; // End of the loop. ?>
              		</div> 		<!-- .split-wrapper -->

            <section class="front-slider">
                <h2>Compliments</h2>

                <div class="slider">
                  <div class="flexslider">
                    <ul class="slides">
                      
                        <?php
                          $args = array (
                                          'post_type' => 'testimonial',
                                          'posts_per_page' => -1
                                           );

                          $compliments = new WP_Query($args);

                          if($compliments->have_posts()){
                            while($compliments->have_posts()){
                              $compliments->the_post();
                                echo "<li>";
                              //display fields, if exists
                              if(function_exists('get_field')){
                                echo "<blockquote><figure>";
                                            
                                if(get_field('compliment_content')){
                                  //echo "<>"
                                  the_field('compliment_content');
                                }
                              
                                echo "<figcaption>";
                                if(get_field('compliment_author')){
                                  the_field('compliment_author');
                                } 
                                echo "</figcaption>";
                                echo "</figure>";
                                echo "</blockquote>";
                              }
                                echo " </li>";
                            }

                            wp_reset_postdata(); 
                          }

                          ?>
                     
                    </ul>
                  </div><!-- .flexslider -->
                </div><!-- .slider -->



            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
