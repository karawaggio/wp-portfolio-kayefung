<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kayesha
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="footer-nav">
		    	<nav id="footer-navigation" class="footer-navigation">
		        	<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
		        </nav>
		                	
				<nav id="social-navigation" class="social-navigation">
			        <?php wp_nav_menu( array( 'theme_location' => 'socialmenu') ); ?>
		        </nav>
			</div><!-- end of div footer nav -->

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kayesha' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kayesha' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'kayesha' ), 'kayesha', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- end of .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
