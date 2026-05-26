<?php
/**
 * Advanced Search Engine Logic
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_mas_predictive_search', 'mas_predictive_search');
add_action('wp_ajax_nopriv_mas_predictive_search', 'mas_predictive_search');

function mas_predictive_search() {
    check_ajax_referer('mas-ajax-nonce', 'nonce');

    $search_term = sanitize_text_field($_POST['term']);

    $args = array(
        'post_type' => 'shop_product',
        's' => $search_term,
        'posts_per_page' => 5,
    );

    $query = new WP_Query($args);
    $results = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = array(
                'title' => get_the_title(),
                'url' => get_permalink(),
                'price' => get_post_meta(get_the_ID(), '_price', true),
            );
        }
    }

    wp_send_json($results);
}
