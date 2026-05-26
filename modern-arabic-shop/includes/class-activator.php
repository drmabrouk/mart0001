<?php
/**
 * Plugin Activator Logic - Standalone Ecosystem
 */

if (!defined('ABSPATH')) {
    exit;
}

function mas_create_required_pages() {
    $pages = array(
        'home'        => array('title' => 'الرئيسية', 'content' => '[mas_home]'),
        'search'      => array('title' => 'البحث', 'content' => '[mas_product_search]'),
        'cart'        => array('title' => 'السلة', 'content' => '[mas_cart]'),
        'orders'      => array('title' => 'طلباتي', 'content' => '[mas_orders]'),
        'profile'     => array('title' => 'الحساب', 'content' => '[mas_profile]'),
        'settings'    => array('title' => 'الإعدادات', 'content' => '[mas_settings]'),
        'management'  => array('title' => 'إدارة النظام', 'content' => '[mas_admin_panel]'),
    );

    foreach ($pages as $slug => $data) {
        $check_page_exists = get_page_by_path($slug);

        if (!$check_page_exists) {
            wp_insert_post(array(
                'post_title'    => $data['title'],
                'post_name'     => $slug,
                'post_content'  => $data['content'],
                'post_status'   => 'publish',
                'post_type'     => 'page',
            ));
        }
    }
}
