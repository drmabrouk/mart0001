<?php
/**
 * Register Custom Post Types
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'mas_register_post_types');
function mas_register_post_types() {
    // Product Post Type
    register_post_type('shop_product', array(
        'labels'      => array(
            'name'          => __('المنتجات', 'modern-arabic-shop'),
            'singular_name' => __('منتج', 'modern-arabic-shop'),
            'add_new'       => __('إضافة منتج جديد', 'modern-arabic-shop'),
            'edit_item'     => __('تعديل المنتج', 'modern-arabic-shop'),
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'   => 'dashicons-cart',
        'show_in_rest' => true,
    ));

    // Order Post Type
    register_post_type('shop_order', array(
        'labels'      => array(
            'name'          => __('الطلبات', 'modern-arabic-shop'),
            'singular_name' => __('طلب', 'modern-arabic-shop'),
        ),
        'public'      => false,
        'show_ui'     => true,
        'supports'    => array('title'),
        'menu_icon'   => 'dashicons-list-view',
    ));
}
