<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package classic
 */

?>

<section class="shop">
    <div class="container">
        <h2>Shop Clarity</h2>
        <p class="desc-shop">We offer supplement for you with very good quality for health</p>
        <div class="product-list">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 6
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $price = get_post_meta(get_the_ID(), '_product_price', true);
                    $content = get_post_meta(get_the_ID(), '_product_content', true);
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php 
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', array('class' => 'product-img'));
                            } else {
                                echo '<img src="' . get_template_directory_uri() . '/assets/product-supplement3.png" alt="Default Product Image">';
                            }
                            ?>
                        </div>

                        <div class="product-info">
                            <div class="product-details">
                                <h3 class="product-title"><?php the_title(); ?></h3>
                                <p class="product-quantity"><?php echo esc_html($content); ?> capsules</p>
                            </div>
                            <div class="product-price">
                                <p>$ <?php echo esc_html(number_format($price, 2)); ?></p>
                            </div>
                        </div>

                        <button class="add-to-cart">Add To Cart</button>
                    </div>


                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No products available.</p>';
            endif;
            ?>
        </div>
    </div>
</section>



