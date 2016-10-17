<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kayesha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<section class="services-content">
		<div class="entry-content">

			<div class="cta-book"> 
				<a href="http://kayefung.htpwebdesign.ca/contact/">Book an Appt</a>
			</div>
			
			<?php echo do_shortcode( '[menu-card]' ); ?>

			<p class="services-message">Don't see what you are looking for? Check out my <a class="services-link" href="<?php echo get_page_link(20); ?>">FAQ</a> or <a class="services-link" href="<?php echo get_page_link(20); ?>">Contact Me</a>.</p>

			<p class="services-message">*&nbsp;<em>Please note prices may vary based on travel and complexity. Please consult first if possible</em></p>

			<!--  <?php the_content(); ?> --><!-- wysiwyg editor text will appear here if uncomment -->

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kayesha' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</section>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'kayesha' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
