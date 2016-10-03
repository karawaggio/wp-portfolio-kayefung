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

			<div class="aboutsection">
				<?php
				while ( have_posts() ) : the_post();

				echo "<div class=profilepic>";
				the_post_thumbnail('medium');
				echo "</div>";

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;

				endwhile; // End of the loop.
				?>

				<div class="aboutpagelinks">
					<div class="portfoliolink">
						<h3><a href="../portfolio"> See My Portfolio... </a></h3>
					</div>

					<div class="bloglink">
						<h3><a href="../blog"> Read My Blog... </a></h3>
					</div>
				</div>
			</div><!-- end of aboutsection -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
