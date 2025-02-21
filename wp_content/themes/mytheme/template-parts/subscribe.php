<?php
/**
 * Template Name: Subscribe Page
 */

?>


<section class="subscribe-section">
    <div class="subscribe-container">
        <h2 class="subscribe-title">Subscribe To Our Newsletter</h2>
        <p class="subscribe-subtitle">Sign up for our newsletter for information, offers and more.</p>

        <form action="#" method="post" class="subscribe-form">
            <div class="input-group">
                <span class="email-icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mail.png" alt="Email Icon">
                </span>
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button type="submit" class="subscribe-btn">Send Now</button>
            </div>
        </form>
        
    </div>
</section>