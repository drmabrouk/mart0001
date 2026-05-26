<?php
/**
 * Plugin Activator Logic
 */

if (!defined('ABSPATH')) {
    exit;
}

function mas_create_shop_home_page() {
    $page_title = 'الرئيسية'; // Arabic for Home
    $page_content = '<!-- wp:shortcode -->[mas_product_search]<!-- /wp:shortcode --> <!-- wp:shortcode -->[mas_product_filters]<!-- /wp:shortcode --> <!-- wp:shortcode -->[mas_product_grid]<!-- /wp:shortcode -->';

    $check_page_exists = get_page_by_title($page_title);

    if (!$check_page_exists) {
        $page_id = wp_insert_post(array(
            'post_title'    => $page_title,
            'post_content'  => $page_content,
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ));

        update_option('mas_shop_home_page_id', $page_id);
    }
}
