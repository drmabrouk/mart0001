<?php
/**
 * Master Layout Template - Standalone UI
 */

if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('mas-standalone-ui'); ?>>

<header class="mas-header mas-rounded">
    <div class="mas-container">
        <div class="mas-header-top">
            <div class="mas-logo">
                <a href="<?php echo home_url('/home'); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
            <div class="mas-header-search-container">
                <?php echo do_shortcode('[mas_product_search]'); ?>
            </div>
        </div>

        <!-- Desktop Nav -->
        <nav class="mas-desktop-nav">
            <a href="<?php echo home_url('/home'); ?>"><?php _e('الرئيسية', 'modern-arabic-shop'); ?></a>
            <a href="<?php echo home_url('/search'); ?>"><?php _e('البحث', 'modern-arabic-shop'); ?></a>
            <a href="<?php echo home_url('/cart'); ?>"><?php _e('السلة', 'modern-arabic-shop'); ?></a>
            <a href="<?php echo home_url('/orders'); ?>"><?php _e('طلباتي', 'modern-arabic-shop'); ?></a>
            <?php if (current_user_can('manage_options')) : ?>
                <a href="<?php echo home_url('/admin-panel'); ?>"><?php _e('لوحة الإدارة', 'modern-arabic-shop'); ?></a>
            <?php endif; ?>
        </nav>
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
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('جميع الحقوق محفوظة', 'modern-arabic-shop'); ?></p>
    </div>
</footer>

<?php
// Render mobile floating nav via standard hook already in modern-arabic-shop.php
wp_footer();
?>
</body>
</html>
