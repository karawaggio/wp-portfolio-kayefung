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
		<?php	if (function_exists ('get_field')){
        		if (get_field('special_message')) {
        		echo "<div class='specialmessage'>";
        		echo "<p>";
        		the_field('special_message');
        		echo "</p>";
        		echo "</div>";
        		}
        ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			echo "<div class='maincontact'>";
			while ( have_posts() ) : the_post();

			echo "<div class='contactimage'>";
			the_post_thumbnail('medium');
			echo "</div>";

				get_template_part( 'template-parts/content', 'contact' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

			<?php
			echo "<div class='contactinfo'>";
        	
            	if(get_field('phone_number')){
            	echo "<div class='phone'>";
            	echo "<h3> Phone </h3>";
            	echo "<a href='tel:";
                the_field('phone_number');
                echo "'>";
                the_field('phone_number');
                echo "</a>";
                echo "</div>";	
            	}
            	if(get_field('email')){
            	echo "<div class='email'>";
            	echo "<h3> Email </h3>";
            	echo "<a href='mailto:";
                the_field('email');
                echo "'>";
                the_field('email');
                echo "</a>";
                echo "</div>";
            	}
        	}
            ?>
                <nav id="contact-social-navigation" class="contact-social-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'mainsocialmenu') ); ?>
                </nav>  

            <?php echo "</div>"; ?>
            <?php echo "</div>"; ?>


			<?php
                $args = array (
                    'post_type' => 'faq',
                    'posts_per_page' => -1,
                    'order' => ASC
                     );

    		$faq = new WP_Query($args);

			echo "<div class='faq'>";
			echo "<h2> FAQ </h2>";
			echo "<ul>";
    		if($faq->have_posts()){
    		 while($faq->have_posts()){
    		  $faq->the_post();
    		  
    		   echo "<li><h3 class='question'>";
    		  the_title();
    		  echo "</h3><span class='answer'>";
    		  the_content();
    		   echo " </span></li>";
    		 }//end while
    		 echo "</ul>";
    		 echo "</div>";
    		 wp_reset_postdata(); 
    		}//end if                      
    		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();