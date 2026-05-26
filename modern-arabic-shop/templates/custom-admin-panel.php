<?php
/**
 * Proprietary Admin Panel Template - Professional Sidebar-Top Layout
 */
if (!defined('ABSPATH')) exit;

require_once MAS_PLUGIN_DIR . 'includes/admin-management.php';
?>

<div class="mas-admin-portal mas-rounded">
    <!-- Top Bar -->
    <header class="mas-portal-topbar">
        <div class="mas-topbar-left">
            <span class="mas-system-metric"><?php _e('المبيعات اليومية:', 'modern-arabic-shop'); ?> 0 <?php _e('ج.م', 'modern-arabic-shop'); ?></span>
        </div>
        <div class="mas-topbar-right">
            <span class="mas-admin-status"><span class="mas-online-dot"></span> <?php _e('المسؤول متصل', 'modern-arabic-shop'); ?></span>
            <button class="mas-notif-toggle"><span class="dashicons dashicons-bell"></span></button>
        </div>
    </header>

    <div class="mas-portal-wrapper">
        <!-- Right Sidebar -->
        <aside class="mas-portal-sidebar">
            <div class="mas-sidebar-header">
                <span class="dashicons dashicons-store"></span>
                <h3><?php _e('إدارة النظام', 'modern-arabic-shop'); ?></h3>
            </div>
            <nav class="mas-portal-nav">
                <a href="#stats" class="active"><span class="dashicons dashicons-dashboard"></span> <span><?php _e('الإحصائيات', 'modern-arabic-shop'); ?></span></a>
                <a href="#products"><span class="dashicons dashicons-products"></span> <span><?php _e('المنتجات', 'modern-arabic-shop'); ?></span></a>
                <a href="#vendors"><span class="dashicons dashicons-groups"></span> <span><?php _e('التجار', 'modern-arabic-shop'); ?></span></a>
                <a href="#users"><span class="dashicons dashicons-admin-users"></span> <span><?php _e('المستخدمين', 'modern-arabic-shop'); ?></span></a>
                <a href="#orders"><span class="dashicons dashicons-cart"></span> <span><?php _e('الطلبات', 'modern-arabic-shop'); ?></span></a>
                <a href="#logs"><span class="dashicons dashicons-list-view"></span> <span><?php _e('السجلات', 'modern-arabic-shop'); ?></span></a>
                <a href="#settings"><span class="dashicons dashicons-admin-generic"></span> <span><?php _e('الإعدادات', 'modern-arabic-shop'); ?></span></a>
            </nav>
        </aside>

        <!-- Main Viewport (Left Area) -->
        <main class="mas-portal-main">
            <div id="stats" class="mas-portal-section">
                <?php include_once MAS_PLUGIN_DIR . 'includes/admin-dashboard.php';
                      mas_render_admin_dashboard(); ?>
            </div>

            <div id="products" class="mas-portal-section" style="display:none;">
                <?php mas_render_product_management(); ?>
            </div>

            <div id="logs" class="mas-portal-section" style="display:none;">
                <?php mas_render_system_logs(); ?>
            </div>
        </main>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $('.mas-portal-nav a').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href').substring(1);

        $('.mas-portal-nav a').removeClass('active');
        $(this).addClass('active');

        $('.mas-portal-section').hide();
        $('#' + target).show();
    });
});
</script>
