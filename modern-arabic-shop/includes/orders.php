<?php
/**
 * Order Lifecycle and Serial Numbers
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Generate Serial Number on order creation
 */
add_action('save_post_shop_order', 'mas_generate_order_serial', 10, 3);
function mas_generate_order_serial($post_id, $post, $update) {
    if (!$update) {
        $serial = 'ORD-' . date('Ymd') . '-' . strtoupper(wp_generate_password(4, false));
        update_post_meta($post_id, '_order_serial', $serial);
        update_post_meta($post_id, '_order_status', 'pending');
    }
}

/**
 * Add metadata for order totals
 */
function mas_add_order_meta($order_id, $data) {
    update_post_meta($order_id, '_subtotal', $data['subtotal']);
    update_post_meta($order_id, '_tax', $data['tax']);
    update_post_meta($order_id, '_delivery_fee', $data['delivery_fee']);
    update_post_meta($order_id, '_total', $data['total']);
}

/**
 * AJAX: Cancel Order
 */
add_action('wp_ajax_mas_cancel_order', 'mas_ajax_cancel_order');
function mas_ajax_cancel_order() {
    check_ajax_referer('mas-ajax-nonce', 'nonce');

    $order_id = intval($_POST['order_id']);
    $status = get_post_meta($order_id, '_order_status', true);

    if ($status === 'pending' && get_post_field('post_author', $order_id) == get_current_user_id()) {
        update_post_meta($order_id, '_order_status', 'cancelled');
        wp_send_json_success(__('تم إلغاء الطلب بنجاح.', 'modern-arabic-shop'));
    }

    wp_send_json_error(__('لا يمكن إلغاء هذا الطلب.', 'modern-arabic-shop'));
}
