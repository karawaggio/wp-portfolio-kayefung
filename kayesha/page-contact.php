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

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

			<?php
                $args = array (
                    'post_type' => 'faq',
                    'posts_per_page' => -1
                     );

    		$faq = new WP_Query($args);


    		if($faq->have_posts()){
    		 while($faq->have_posts()){
    		  $faq->the_post();
    		   echo "<li>";
    		  the_title();
    		  the_content();
    		   echo " </li>";
    		 }//end while
    		 wp_reset_postdata(); 
    		}//end if                      
    		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
