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

    // Create home page
    mas_create_shop_home_page();

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
 * Frontend Hooks
 */
add_action('wp_footer', 'mas_render_floating_nav');
function mas_render_floating_nav() {
    if (wp_is_mobile()) {
        include MAS_PLUGIN_DIR . 'templates/bottom-nav.php';

        if (current_user_can('vendor')) {
            include MAS_PLUGIN_DIR . 'templates/vendor-fab.php';
        }
    }
}
