<?php
/**
 * Advanced Search Engine Logic - SPA Suggestions
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_mas_predictive_search', 'mas_predictive_search');
add_action('wp_ajax_nopriv_mas_predictive_search', 'mas_predictive_search');

function mas_predictive_search() {
    check_ajax_referer('mas-ajax-nonce', 'nonce');

    global $wpdb;
    $search_term = sanitize_text_field($_POST['term']);

    // Direct DB query for instant synchronization
    $results_raw = $wpdb->get_results($wpdb->prepare(
        "SELECT ID, post_title FROM {$wpdb->posts}
         WHERE post_title LIKE %s
         AND post_type = 'shop_product'
         AND post_status = 'publish'
         LIMIT 6",
        '%' . $wpdb->esc_like($search_term) . '%'
    ));

    $results = array();
    if ($results_raw) {
        foreach ($results_raw as $post) {
            $price = get_post_meta($post->ID, '_price', true);
            $results[] = array(
                'title' => $post->post_title,
                'url' => get_permalink($post->ID),
                'price' => $price ? $price : '0',
            );
        }
    }

    wp_send_json($results);
}
