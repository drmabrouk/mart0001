<?php
/**
 * Smart Filtering Backend Logic
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_mas_filter_products', 'mas_filter_products');
add_action('wp_ajax_nopriv_mas_filter_products', 'mas_filter_products');

function mas_filter_products() {
    check_ajax_referer('mas-ajax-nonce', 'nonce');

    $min_price = isset($_POST['min_price']) ? floatval($_POST['min_price']) : 0;
    $max_price = isset($_POST['max_price']) ? floatval($_POST['max_price']) : 999999;

    $args = array(
        'post_type' => 'shop_product',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => '_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'numeric',
                'compare' => 'BETWEEN',
            ),
        ),
    );

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            include MAS_PLUGIN_DIR . 'templates/product-grid-item.php';
        }
    } else {
        echo '<p>' . __('No products match your filters.', 'modern-arabic-shop') . '</p>';
    }
    $html = ob_get_clean();

    wp_send_json_success($html);
}
