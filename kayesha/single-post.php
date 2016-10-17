<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kayesha
 */

get_header(); ?>

    <section class="blog-navigation">

		<?php

		$categories = get_categories( array(
			    'orderby' => 'name',
			    'parent'  => 0
			) );
			 
			 	echo "<ul>";
			foreach ( $categories as $category ) {
			    printf( '<li><a href="%1$s">%2$s</a></li>',
			        esc_url( get_category_link( $category->term_id ) ),
			        esc_html( $category->name )
			    );    
			}
				echo "</ul>";
		 ?>
		 
	</section><!-- .blog-navigation -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
