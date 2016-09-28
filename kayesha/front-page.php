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

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>

	<?php //while ( have_posts() ) : the_post(); ?>
    <?php endwhile; // End of the loop. ?>

			<section class="home-page">   
            	<section class="about">
	                <h2>About</h2>
		              <?php  
		              if (function_exists('get_field')){

		                if(get_field('about')){
		                the_field('about');
		                    }
		                }?>
		            </section><!--.about  -->
		            
		            <section class="services">
		                <h2>Services</h2>
		                 <?php  if (function_exists('get_field')){

		                if(get_field('services')){
		                the_field('services');
		                    }
		                } ?>
		            </section><!--.servcices  -->
	           

            </section><!--.home-page  -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
