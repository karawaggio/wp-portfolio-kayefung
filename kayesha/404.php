<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kayesha
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main error-content" role="main">

			<section class="error-404 not-found">

				<div class="page404-content">
				<img class="kayefung-logo" src="<?php echo get_template_directory_uri(); ?>/images/kaye-small-logo-2.png" alt="" />
					<h1 class="page404-title"><?php esc_html_e( '404: Sorry, the page you are looking for cannot be found.', 'kayesha' ); ?></h1>

					<ul>
						<li><p class="page404-text">If you typed the URL directly, please check if the spelling is correct.</p></li>
						<li><p class="page404-text">If you clicked on a link to get here, the content was moved to the new URL.</p></li>
						<li><p class="page404-text">If you are not sure how you got here, simply return to the <a class="page404-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Homepage.</a></p></li>
						<li><p class="page404-text">Please try search box below to search for an item.</p></li>
					</ul>

					<?php get_search_form(); ?>
				</div><!-- .error-content -->

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
