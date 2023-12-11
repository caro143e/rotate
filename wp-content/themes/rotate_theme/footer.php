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
            <li>OUR STORY</li>
            <li>CONTACT</li>
        </ul>
    </div>
    
    <!-- Column 2 -->
    <div class="footer-column">
        <h5>HELP</h5>
        <ul class="footer-list">
            <li>FAQ</li>
            <li>SHIPPING & RETURNS</li>
            <li>TERMS & CONDITIONS </li>
        </ul>
    </div>
    
    <!-- Column 3 -->
    <div class="footer-column">
        <h5>FOLLOW US </h5>
		<div class="footer-social-icons">
        <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24"><path fill="#C13584" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9 114.9-51.3 114.9-114.9-51.3-114.9-114.9-114.9zm0 189.6a74.8 74.8 0 1 1 74.8-74.8 74.8 74.8 0 0 1-74.8 74.8zm146.4-125.1c0 14.9-12 27-26.8 27-14.9 0-27-12-27-27 0-14.9 12.1-26.8 27-26.8 14.8 0 26.8 12 26.8 26.8zm76.1-27.2c-2-4.1-4.5-7.7-9.4-10.9-5-3.2-11.2-5.3-17.8-5.3-14.4 0-28.1 5.8-38.7 16.5-10.6 10.7-16.5 24.4-16.5 38.7 0 6.7 2.1 12.8 5.3 17.8s6.9 7.5 10.9 9.4c4.9 2.4 10 3.6 15.3 3.6 5.4 0 10.4-1.2 15.4-3.6 4-1.9 7.6-4.4 10.9-9.4 3.2-5 5.3-11.1 5.3-17.8 0-14.3-5.8-28-16.5-38.7-10.6-10.7-24.3-16.5-38.7-16.5-6.6 0-12.8 2.1-17.8 5.3-4.1 2.9-7.4 6.5-9.4 10.9-2.4 4.9-3.6 10-3.6 15.4 0 5.3 1.2 10.4 3.6 15.3 2 4 4.4 7.6 9.4 10.9 5 3.2 11.2 5.3 17.8 5.3 14.3 0 27.9-5.8 38.6-16.5 10.7-10.6 16.5-24.3 16.5-38.6 0-6.7-2.1-12.9-5.3-17.8-3.2-5-6.8-7.6-10.9-10.9z"></path></svg>
        </a>
        <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
        
    </div>
    
    <!-- Column 4 with Sign Up Form -->
    <div class="footer-column signup-container">
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
<div class="footer-logo-container">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/pictures/logo.svg" alt="Logo" class="footer-logo" >
</div>


<?php 
	astra_footer_after(); 
    
	astra_body_bottom();    
	wp_footer(); 
?>

	</body>
</html>
