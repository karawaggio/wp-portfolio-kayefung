<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kayesha
 */

?>
<section class="blogposts">
	<article class="blogblog" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

		<div class="entry-content">
			<?php the_post_thumbnail('medium', array('class' => 'center')); ?>

			<header class="entry-header">
				<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) : ?>

				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php the_excerpt(); ?>

				<div class="entry-meta">
					<?php kayesha_posted_on(); ?>
				</div><!-- .entry-meta -->
				
			<?php 
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kayesha' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php kayesha_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</section><!-- end of blogposts -->