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
			<section class="footer-main-content">
				<nav id="footer-navigation" class="footer-navigation">
			    	<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
			    </nav>

				<div class="inner-container">

					<div class="footer-copyright-developers">
				        <p class="footer-copyright">&copy; 2016 Kayefung Artistry. All rights reserved.</p>
				        <p class="developers-info">Developed by:&nbsp;&nbsp;<a href="#">Arlene Ata</a>,<a href="#"> Greg Voth</a>, and <a href="#">Sergey Karavaev</a></p>
					</div><!-- end of .footer-copyright-developers -->

					<nav id="footer-social-navigation" class="	footer-social-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'socialfooter') ); ?>
					</nav>

					<div class="footer-contact-info">
						<?php
						    echo "<div class='footer-email'>";
								if(get_field('email_footer', 18) ){
									the_field('email_footer', 18);
								}
							echo "</div>";
						?>

						<?php
						    echo "<div class='footer-phone-numb'>";
								if(get_field('telephone_footer', 18) ){
									the_field('telephone_footer', 18);
								}
							echo "</div>";
						?>

						<?php
						    echo "<div class='footer-location'>";
								if(get_field('location_footer', 18) ){
									the_field('location_footer', 18);
								}
							echo "</div>";
						?>

						<a href="#">
							<img class="topbutton" src="<?php echo get_template_directory_uri(); ?>/images/scrolltop.png" alt="Back to top arrow" />
						</a> 

				    </div><!-- end of .social-nav-info -->
				</div><!-- end of .inner-container -->
			</section><!-- end of .footer-main-content -->

		</div><!-- end of .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
