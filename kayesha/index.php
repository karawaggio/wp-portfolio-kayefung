<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		 
	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : 
			if ( is_home() && ! is_front_page() ) : ?>

			<header>
				<h1 class="page-title screen-reader-text">
					<?php single_post_title(); ?>
				</h1>
			</header>

		<?php endif; ?>

		<section class="blog-main-page">
			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/contentindex', get_post_format() );

				endwhile;

				the_posts_navigation();

				else :

				get_template_part( 'template-parts/content', 'none' );

				endif; 
			?>
		</section><!-- end of .blog-main-page -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
