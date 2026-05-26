<?php
/**
 * Admin Management Interfaces (Users, Products, Logs)
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'mas_add_management_submenus');
function mas_add_management_submenus() {
    add_submenu_page(
        'mas-dashboard',
        __('إدارة المستخدمين', 'modern-arabic-shop'),
        __('المستخدمين', 'modern-arabic-shop'),
        'manage_options',
        'mas-users',
        'mas_render_user_management'
    );

    add_submenu_page(
        'mas-dashboard',
        __('سجلات النظام', 'modern-arabic-shop'),
        __('السجلات', 'modern-arabic-shop'),
        'manage_options',
        'mas-logs',
        'mas_render_system_logs'
    );
}

/**
 * Render Product Management Module
 */
function mas_render_product_management() {
    $products = get_posts(array('post_type' => 'shop_product', 'posts_per_page' => -1));
    ?>
    <div class="mas-module">
        <h2><?php _e('إدارة المنتجات', 'modern-arabic-shop'); ?></h2>
        <table class="mas-admin-table mas-rounded">
            <thead>
                <tr>
                    <th><?php _e('المنتج', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('السعر', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('الحالة', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('الإجراءات', 'modern-arabic-shop'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p) : ?>
                <tr>
                    <td><?php echo esc_html($p->post_title); ?></td>
                    <td><?php echo get_post_meta($p->ID, '_price', true); ?> <?php _e('ج.م', 'modern-arabic-shop'); ?></td>
                    <td><?php echo esc_html($p->post_status); ?></td>
                    <td>
                        <button class="mas-btn-icon"><span class="dashicons dashicons-edit"></span></button>
                        <button class="mas-btn-icon mas-text-danger"><span class="dashicons dashicons-trash"></span></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function mas_render_user_management() {
    ?>
    <div class="wrap">
        <h1><?php _e('إدارة أدوار المستخدمين', 'modern-arabic-shop'); ?></h1>
        <?php
        $users = get_users(array('role__in' => array('customer', 'vendor')));
        ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?php _e('اسم المستخدم', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('البريد الإلكتروني', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('الدور', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('الإجراءات', 'modern-arabic-shop'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo esc_html($user->user_login); ?></td>
                    <td><?php echo esc_html($user->user_email); ?></td>
                    <td><?php echo implode(', ', $user->roles); ?></td>
                    <td>
                        <a href="<?php echo get_edit_user_link($user->ID); ?>"><?php _e('تعديل', 'modern-arabic-shop'); ?></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function mas_render_system_logs() {
    ?>
    <div class="wrap">
        <h1><?php _e('سجلات النظام (Audit Trail)', 'modern-arabic-shop'); ?></h1>
        <div class="mas-log-container mas-rounded">
            <p>[<?php echo date('Y-m-d H:i:s'); ?>] <?php _e('تغيير حالة المنتج #101 إلى منشورة.', 'modern-arabic-shop'); ?></p>
            <p>[<?php echo date('Y-m-d H:i:s'); ?>] <?php _e('تسجيل تاجر جديد: أحمد علي.', 'modern-arabic-shop'); ?></p>
        </div>
    </div>
    <?php
}
