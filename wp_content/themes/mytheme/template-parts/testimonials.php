<?php
/**
 * Template Name: Testimonials
 */


?>

<section class="testimonial">
    <div class="container">
        <h2 class="section-title">Testimonials</h2>
        <p class="section-subtitle">We have provided the best service to customers who have trusted us.</p>

        <div class="testimonial-list">
        <?php
            $args = array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 5
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $location = get_post_meta(get_the_ID(), '_testimonial_location', true);
                    $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                    ?>
                    
                    <div class="testimonial-card">
                        <div class="stars">
                            <?php echo str_repeat('★', intval($rating)); ?>
                        </div>
                        <div class="testimonial-text"><?php the_content(); ?></div>
                        <div class="testimonial-user">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="user-avatar"><?php the_post_thumbnail('thumbnail'); ?></div>
                            <?php else : ?>
                                <div class="user-avatar">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Ellipse.png" alt="Default Avatar">
                                </div>
                            <?php endif; ?>
                            <div class="user-info">
                                <strong><?php the_title(); ?></strong>
                                <span><?php echo esc_html($location); ?></span>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No testimonials available.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
