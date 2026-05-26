<?php
/**
 * Product Grid Layout Template
 */
?>
<div class="mas-product-grid">
    <?php
    $args = array(
        'post_type' => 'shop_product',
        'posts_per_page' => 10,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="mas-product-card mas-rounded">
                <div class="mas-product-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium', array('class' => 'mas-rounded')); ?>
                    <?php else: ?>
                        <div class="mas-placeholder-img mas-rounded"></div>
                    <?php endif; ?>
                </div>
                <div class="mas-product-info">
                    <h3 class="mas-product-title"><?php the_title(); ?></h3>
                    <p class="mas-product-price"><?php echo get_post_meta(get_the_ID(), '_price', true); ?> <?php _e('SAR', 'modern-arabic-shop'); ?></p>
                    <button class="mas-add-to-cart mas-button"><?php _e('Add to Cart', 'modern-arabic-shop'); ?></button>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p><?php _e('No products found.', 'modern-arabic-shop'); ?></p>
    <?php endif; ?>
</div>
