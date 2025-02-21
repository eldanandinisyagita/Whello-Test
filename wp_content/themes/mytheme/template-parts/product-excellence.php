<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package classic
 */

?>

<section class="product-excellence">
    <div class="container">
        <h2 class="section-title">Why Choose Our Product</h2>
        <p class="section-subtitle">
            Clarity was created with the mission to improve your health and wellbeing 
            with the purest olive products on earth.
        </p>

        <div class="excellence-grid">
            <div class="excellence-card">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/perfect-quality.svg" alt="Best Price Offers">
                </div>
                <h3>Perfect Quality</h3>
                <p>We grow, farm, and bottle the finest olive products you can find.</p>
            </div>

            <div class="excellence-card">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/best-price.svg" alt="Best Price Offers">
                </div>
                <h3>Best Price Offers</h3>
                <p>The price is very affordable among similar products.</p>
            </div>

            <div class="excellence-card">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/100_-natural.svg" alt="Best Price Offers">
                </div>
                <h3>100% Natural</h3>
                <p>Harvested from the finest olive trees that deliver health benefits.</p>
            </div>
        </div>
    </div>
</section>
