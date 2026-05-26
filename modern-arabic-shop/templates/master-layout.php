<?php
/**
 * Master Layout Template - Standalone UI Burgundy Theme
 */

if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class('mas-standalone-ui'); ?>>

<header class="mas-header">
    <div class="mas-container">
        <div class="mas-header-top">
            <!-- Logo -->
            <div class="mas-logo">
                <a href="<?php echo home_url('/home'); ?>">
                    <span style="color:#800020">MAS</span><span style="color:#000"> SHOP</span>
                </a>
            </div>

            <!-- Pill-shaped Search -->
            <div class="mas-header-search-container">
                <?php echo do_shortcode('[mas_product_search]'); ?>
            </div>

            <!-- Desktop Actions -->
            <div class="mas-desktop-actions">
                <a href="<?php echo home_url('/cart'); ?>" class="mas-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <span><?php _e('السلة', 'modern-arabic-shop'); ?></span>
                </a>
                <a href="<?php echo home_url('/profile'); ?>" class="mas-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span><?php _e('الحساب', 'modern-arabic-shop'); ?></span>
                </a>
            </div>
        </div>
    </div>
</header>

<main class="mas-main-content">
    <div class="mas-container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
    </div>
</main>

<footer class="mas-footer">
    <div class="mas-container">
        <p>&copy; <?php echo date('Y'); ?> <strong>MAS SHOP</strong>. <?php _e('جميع الحقوق محفوظة', 'modern-arabic-shop'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
