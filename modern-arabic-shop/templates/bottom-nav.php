<?php
/**
 * Bottom Navigation Bar Template
 */
?>
<div class="mas-bottom-nav">
    <a href="<?php echo home_url('/cart'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-cart"></span>
        <span class="mas-nav-label"><?php _e('السلة', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/my-account'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-admin-users"></span>
        <span class="mas-nav-label"><?php _e('الحساب', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/orders'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-backup"></span>
        <span class="mas-nav-label"><?php _e('الطلبات', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/settings'); ?>" class="mas-nav-item">
        <span class="dashicons dashicons-admin-generic"></span>
        <span class="mas-nav-label"><?php _e('الإعدادات', 'modern-arabic-shop'); ?></span>
    </a>
</div>
