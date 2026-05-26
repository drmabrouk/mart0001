<?php
/**
 * Shortcodes Registration
 */

if (!defined('ABSPATH')) {
    exit;
}

add_shortcode('mas_home', 'mas_render_home_shortcode');
function mas_render_home_shortcode() {
    return do_shortcode('[mas_product_grid]');
}

add_shortcode('mas_orders', 'mas_render_orders_shortcode');
function mas_render_orders_shortcode() {
    ob_start();
    include MAS_PLUGIN_DIR . 'templates/order-history.php';
    return ob_get_clean();
}

add_shortcode('mas_profile', 'mas_render_profile_shortcode');
function mas_render_profile_shortcode() {
    if (current_user_can('vendor')) {
        ob_start();
        include MAS_PLUGIN_DIR . 'templates/vendor-portal.php';
        return ob_get_clean();
    }
    return '<p>' . __('مرحباً بك في ملفك الشخصي.', 'modern-arabic-shop') . '</p>';
}

add_shortcode('mas_admin_panel', 'mas_render_admin_panel_shortcode');
function mas_render_admin_panel_shortcode() {
    if (!current_user_can('manage_options')) {
        return '<p>' . __('عذراً، لا تملك صلاحية الوصول لهذه الصفحة.', 'modern-arabic-shop') . '</p>';
    }
    ob_start();
    include MAS_PLUGIN_DIR . 'templates/custom-admin-panel.php';
    return ob_get_clean();
}

add_shortcode('mas_product_grid', 'mas_render_product_grid');
function mas_render_product_grid() {
    ob_start();
    include MAS_PLUGIN_DIR . 'templates/product-grid.php';
    return ob_get_clean();
}

add_shortcode('mas_product_search', 'mas_render_product_search');
function mas_render_product_search() {
    return '
    <div class="mas-search-container">
        <input type="text" id="masSearch" class="mas-rounded" placeholder="' . __('ابحث عن منتجات...', 'modern-arabic-shop') . '">
        <div id="masSearchResults" class="mas-rounded"></div>
    </div>';
}

add_shortcode('mas_product_filters', 'mas_render_product_filters');
function mas_render_product_filters() {
    return '
    <div class="mas-filters-container">
        <button id="masFilterBtn" class="mas-filter-btn mas-button">' . __('تصفية', 'modern-arabic-shop') . '</button>
        <div id="masFilterOptions" style="display:none; margin-top:10px;">
            <input type="number" id="masMinPrice" placeholder="' . __('أقل سعر', 'modern-arabic-shop') . '">
            <input type="number" id="masMaxPrice" placeholder="' . __('أعلى سعر', 'modern-arabic-shop') . '">
        </div>
    </div>';
}
