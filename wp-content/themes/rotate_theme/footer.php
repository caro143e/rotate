<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->

<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer(); // The Astra footer function. You can also override this if needed.
?>

<div class="custom-footer-container">
    
    <!-- Column 1 -->
    <div class="footer-column">
        <h5>ABOUT</h5>
        <ul class="footer-list">
             <a href="https://loststudios.dk/kea/rotate/about-and-contact/">
                <li>OUR STORY</li>
            </a> 
            <a href="https://loststudios.dk/kea/rotate/contact-us/">
            <li>CONTACT</li>
            </a> 
        </ul>
    </div>
    
    <!-- Column 2 -->
    <div class="footer-column">
        <h5>HELP</h5>
        <ul class="footer-list">
            <a href="https://loststudios.dk/kea/rotate/faq/"> 
            <li>FAQ</li>
          </a>
            <a href="https://loststudios.dk/kea/rotate/faq/"> 
            <li>SHIPPING & RETURNS</li>
            </a>
            <a href="https://loststudios.dk/kea/rotate/faq/"> 
            <li>TERMS & CONDITIONS </li>
            </a>
        </ul>
    </div>
    
    <!-- Column 3 -->
    <div class="footer-column">
        <h5>FOLLOW US </h5>
        <div class="socials">
        <a href="https://www.instagram.com/rotatebirgerchristensen/" class="social-link">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/pictures/ig.png" alt="instagram" height="30px" width="30px">
      </a>
      <a href="https://www.facebook.com/rotatebirgerchristensen" class="social-link">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/pictures/fb.png" alt="facebook" height="30px" width="30px">
     </a>
     </div>
		  
    </div>
    
    <!-- Column 4 with Sign Up Form -->
    <div class="footer-column">
    <div class="footer-newsletter-signup">
        <h5>SIGN UP FOR ROTATE WORLD</h5>
        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
            <input type="hidden" name="action" value="handle_newsletter_signup">
            <input type="email" id="newsletter-email" name="email" placeholder="Your email address" required>
            <button type="submit" class="submit-button">SUBMIT</button>
        </form>
    </div>
  </div>

</div>
<div class="logo-bund">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/pictures/top.svg" alt="Rotate logo" width="1440px" height="318px">
</div>


<?php 
	astra_footer_after(); 
    
	astra_body_bottom();    
	wp_footer(); 
?>

	</body>
</html>
