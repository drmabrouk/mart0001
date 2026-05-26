<?php
/**
 * Register User Roles
 */

if (!defined('ABSPATH')) {
    exit;
}

function mas_register_roles() {
    // Register Customer Role
    add_role(
        'customer',
        __('زبون', 'modern-arabic-shop'),
        array(
            'read'         => true,
            'edit_posts'   => false,
            'delete_posts' => false,
        )
    );

    // Register Vendor Role
    add_role(
        'vendor',
        __('تاجر', 'modern-arabic-shop'),
        array(
            'read'         => true,
            'edit_posts'   => true,
            'upload_files' => true,
            'publish_posts'=> true,
            'delete_posts' => true,
            // Custom vendor capabilities
            'manage_products' => true,
            'view_inventory'  => true,
        )
    );
}
