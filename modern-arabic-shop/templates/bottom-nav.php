<?php
/**
 * Bottom Navigation Bar Template - Ecosystem v2
 */
?>
<div class="mas-bottom-nav">
    <a href="<?php echo home_url('/home'); ?>" class="mas-nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span class="mas-nav-label"><?php _e('الرئيسية', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/search'); ?>" class="mas-nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <span class="mas-nav-label"><?php _e('البحث', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/cart'); ?>" class="mas-nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
        <span class="mas-nav-label"><?php _e('السلة', 'modern-arabic-shop'); ?></span>
    </a>
    <a href="<?php echo home_url('/orders'); ?>" class="mas-nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
        <span class="mas-nav-label"><?php _e('طلباتي', 'modern-arabic-shop'); ?></span>
    </a>
    <?php if (current_user_can('manage_options')) : ?>
    <a href="<?php echo home_url('/management'); ?>" class="mas-nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
        <span class="mas-nav-label"><?php _e('الإدارة', 'modern-arabic-shop'); ?></span>
    </a>
    <?php endif; ?>
</div>
