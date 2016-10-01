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
			<section class="inner-container">

				<div class="footer-nav-copyright">
			    	<nav id="footer-navigation" class="footer-navigation">
			        	<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
			        </nav>

			        <p class="footer-copyright">&copy; 2016 Kayefung Artistry. All rights reserved.</p>
				</div><!-- end of .footer-nav-copyright -->

				<div class="social-nav-info">
					<nav id="footer-social-navigation" class="footer-social-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'socialmenu') ); ?>
				    </nav>
			    </div><!-- end of .social-nav-info -->
			</section><!-- end of .footer-inner-container -->

			<div class="developers-info">
				<p>Developed by:&nbsp;&nbsp;<a href="#">Arlene Ata</a>,<a href="#"> Greg Voth</a>, and <a href="#">Sergey Karavaev</a></p>
			</div><!-- .developers-info -->

		</div><!-- end of .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
