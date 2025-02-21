<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */

?>

<footer id="footer" class="site-footer">
    <div class="footer-container">
        
        <!-- Left Part: Logo & Description -->
        <div class="footer-left">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-footer.svg" alt="Clarity Logo">
            <p>
                Clarity is in the business of improving your health and wellness. We grow, farm, and bottle the finest olive products you can find.
            </p>
        </div>

        <!-- Mid Part: Information -->
        <div class="footer-middle">
            <div>
                <p>Information</p>
                <ul class="footer-menu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Product</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <p>Help Center</p>
				<ul class="footer-menu">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Legal Support</a></li>
                </ul>
            </div>
        </div>

        <!-- Right Part: Contacts & Social Media -->
		<div class="footer-right">
			<div class="contact-item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/phone.svg" alt="Phone">
				<span>0361 123 4567</span>
			</div>
			<div class="contact-item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/mail.svg" alt="Email">
				<a href="mailto:info.clarity@gmail.com">info.clarity@gmail.com</a>
			</div>
			<div class="social-icons">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/instagram.svg" alt="Instagram"></a>
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/twitter.svg" alt="Twitter"></a>
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/facebook.svg" alt="Facebook"></a>
			</div>
		</div>

    </div>

    <div class="copyright">
        Copyright Clarity 2021 All Right Reserved
    </div>
</footer>

<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script>
    function toggleMenu() {
    document.getElementById("navbar-menu").classList.toggle("active");
    }
</script>


</body>
</html>
