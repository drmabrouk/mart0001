<?php
/**
 * Product Grid Item Template
 */
?>
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
        <p class="mas-product-price"><?php echo get_post_meta(get_the_ID(), '_price', true); ?> <?php _e('ريال', 'modern-arabic-shop'); ?></p>
        <button class="mas-add-to-cart mas-button"><?php _e('أضف للسلة', 'modern-arabic-shop'); ?></button>
    </div>
</div>
