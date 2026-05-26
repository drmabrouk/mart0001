<?php
/**
 * Bottom Navigation Bar Template
 */
?>
<div class="mas-bottom-nav mas-rounded">
    <a href="<?php echo home_url('/home'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-admin-home"></span>
        <span class="mas-nav-label"><?php _e('الرئيسية', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/cart'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-cart"></span>
        <span class="mas-nav-label"><?php _e('السلة', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/orders'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-backup"></span>
        <span class="mas-nav-label"><?php _e('طلباتي', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/profile'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-admin-users"></span>
        <span class="mas-nav-label"><?php _e('الحساب', 'modern-arabic-shop'); ?></span>
    </a>
</div>
