<?php
/**
 * Plugin Name: Modern Arabic Shop
 * Description: A professional mobile-first e-commerce plugin with full Arabic localization and PWA experience.
 * Version: 1.0.0
 * Author: Jules
 * Text Domain: modern-arabic-shop
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('MAS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MAS_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Activation Logic
 */
register_activation_hook(__FILE__, 'mas_activate_plugin');
function mas_activate_plugin() {
    require_once MAS_PLUGIN_DIR . 'includes/class-activator.php';
    require_once MAS_PLUGIN_DIR . 'includes/roles.php';

    // Create roles
    mas_register_roles();

    // Create required pages
    mas_create_required_pages();

    // Flush rewrite rules
    flush_rewrite_rules();
}

/**
 * Initialize Plugin
 */
add_action('plugins_loaded', 'mas_init_plugin');
function mas_init_plugin() {
    // Load localization
    load_plugin_textdomain('modern-arabic-shop', false, dirname(plugin_basename(__FILE__)) . '/languages');

    // Include necessary files
    require_once MAS_PLUGIN_DIR . 'includes/enqueue-assets.php';
    require_once MAS_PLUGIN_DIR . 'includes/post-types.php';
    require_once MAS_PLUGIN_DIR . 'includes/search.php';
    require_once MAS_PLUGIN_DIR . 'includes/filters.php';
    require_once MAS_PLUGIN_DIR . 'includes/orders.php';
    require_once MAS_PLUGIN_DIR . 'includes/admin-dashboard.php';
    require_once MAS_PLUGIN_DIR . 'includes/admin-management.php';
    require_once MAS_PLUGIN_DIR . 'includes/shortcodes.php';
}

/**
 * STANDALONE UI: Override theme templates
 */
add_filter('template_include', 'mas_override_templates');
function mas_override_templates($template) {
    if (is_page(array('home', 'search', 'cart', 'orders', 'profile', 'settings', 'management'))) {
        return MAS_PLUGIN_DIR . 'templates/master-layout.php';
    }
    return $template;
}

/**
 * SPA Content Handler
 */
add_action('wp_ajax_mas_get_page_content', 'mas_get_page_content');
add_action('wp_ajax_nopriv_mas_get_page_content', 'mas_get_page_content');
function mas_get_page_content() {
    $slug = sanitize_text_field($_POST['slug']);
    $page = get_page_by_path($slug);
    if ($page) {
        wp_send_json_success(array(
            'title'   => get_the_title($page->ID),
            'content' => apply_filters('the_content', $page->post_content)
        ));
    }
    wp_send_json_error();
}
