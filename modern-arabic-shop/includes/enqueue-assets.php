<?php
/**
 * Enqueue Assets
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'mas_enqueue_frontend_assets');
function mas_enqueue_frontend_assets() {
    // Global styles
    wp_enqueue_style('mas-main-style', MAS_PLUGIN_URL . 'assets/css/main.css', array(), '1.0.0');

    // Bottom Navigation styles
    if (wp_is_mobile()) {
        wp_enqueue_style('mas-bottom-nav', MAS_PLUGIN_URL . 'assets/css/bottom-nav.css', array(), '1.0.0');

        if (current_user_can('vendor')) {
            wp_enqueue_style('mas-vendor-fab', MAS_PLUGIN_URL . 'assets/css/vendor-fab.css', array(), '1.0.0');
        }

        // Order Tracking styles
        wp_enqueue_style('mas-order-tracking', MAS_PLUGIN_URL . 'assets/css/order-tracking.css', array(), '1.0.0');
    }

    // Product Grid styles
    wp_enqueue_style('mas-product-grid', MAS_PLUGIN_URL . 'assets/css/product-grid.css', array(), '1.0.0');

    // Invoice styles
    wp_enqueue_style('mas-invoice', MAS_PLUGIN_URL . 'assets/css/invoice.css', array(), '1.0.0');

    // RTL Support
    if (is_rtl()) {
        wp_enqueue_style('mas-rtl', MAS_PLUGIN_URL . 'assets/css/rtl.css', array(), '1.0.0');
    }

    // Scripts
    wp_enqueue_script('mas-main-script', MAS_PLUGIN_URL . 'assets/js/main.js', array('jquery'), '1.0.0', true);

    // Pass AJAX URL and Nonce to JavaScript
    wp_localize_script('mas-main-script', 'mas_ajax_obj', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('mas-ajax-nonce')
    ));
}

add_action('admin_enqueue_scripts', 'mas_enqueue_admin_assets');
function mas_enqueue_admin_assets() {
    wp_enqueue_style('mas-admin-style', MAS_PLUGIN_URL . 'assets/css/admin.css', array(), '1.0.0');
}
