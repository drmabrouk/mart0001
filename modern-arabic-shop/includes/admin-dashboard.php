<?php
/**
 * Admin Dashboard Overview
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'mas_add_admin_menu');
function mas_add_admin_menu() {
    add_menu_page(
        __('إدارة المتجر', 'modern-arabic-shop'),
        __('المتجر', 'modern-arabic-shop'),
        'manage_options',
        'mas-dashboard',
        'mas_render_admin_dashboard',
        'dashicons-store',
        30
    );
}

function mas_render_admin_dashboard() {
    ?>
    <div class="wrap mas-admin-dashboard">
        <h1><?php _e('نظرة عامة على المتجر', 'modern-arabic-shop'); ?></h1>

        <div class="mas-stats-grid">
            <div class="mas-stat-card mas-rounded">
                <h3><?php _e('إجمالي المبيعات', 'modern-arabic-shop'); ?></h3>
                <p class="mas-stat-value">0 <?php _e('ج.م', 'modern-arabic-shop'); ?></p>
            </div>
            <div class="mas-stat-card mas-rounded">
                <h3><?php _e('إجمالي الطلبات', 'modern-arabic-shop'); ?></h3>
                <p class="mas-stat-value">0</p>
            </div>
            <div class="mas-stat-card mas-rounded">
                <h3><?php _e('الطلبات المعلقة', 'modern-arabic-shop'); ?></h3>
                <p class="mas-stat-value">0</p>
            </div>
            <div class="mas-stat-card mas-rounded">
                <h3><?php _e('إجمالي التجار', 'modern-arabic-shop'); ?></h3>
                <p class="mas-stat-value">0</p>
            </div>
        </div>

        <div class="mas-recent-activity mas-rounded">
            <h2><?php _e('آخر الطلبات', 'modern-arabic-shop'); ?></h2>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php _e('رقم الطلب', 'modern-arabic-shop'); ?></th>
                        <th><?php _e('العميل', 'modern-arabic-shop'); ?></th>
                        <th><?php _e('الحالة', 'modern-arabic-shop'); ?></th>
                        <th><?php _e('الإجمالي', 'modern-arabic-shop'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4"><?php _e('لا توجد طلبات.', 'modern-arabic-shop'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .mas-stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
        .mas-stat-card { background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); }
        .mas-stat-value { font-size: 24px; font-weight: bold; color: #007cba; margin: 10px 0 0; }
        .mas-recent-activity { background: #fff; padding: 20px; margin-top: 30px; border: 1px solid #ccd0d4; }
        .mas-rounded { border-radius: 15px; }
    </style>
    <?php
}
