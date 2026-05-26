<?php
/**
 * Proprietary Admin Portal (/management) - SPA Architecture
 */
if (!defined('ABSPATH')) exit;

require_once MAS_PLUGIN_DIR . 'includes/admin-management.php';
?>

<div class="mas-admin-portal mas-rounded">
    <!-- Full-width Extended Top Bar -->
    <header class="mas-portal-topbar">
        <div class="mas-topbar-left">
            <span class="mas-system-metric"><?php _e('المبيعات:', 'modern-arabic-shop'); ?> 0 <?php _e('ج.م', 'modern-arabic-shop'); ?></span>
        </div>
        <div class="mas-topbar-center">
            <strong><?php _e('لوحة التحكم الاحترافية', 'modern-arabic-shop'); ?></strong>
        </div>
        <div class="mas-topbar-right">
            <span class="mas-admin-status"><?php _e('المسؤول', 'modern-arabic-shop'); ?></span>
        </div>
    </header>

    <div class="mas-portal-wrapper">
        <!-- Right-side Full-height Sidebar -->
        <aside class="mas-portal-sidebar">
            <nav class="mas-portal-nav">
                <a href="#stats" class="active" data-section="stats">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
                    <span><?php _e('الإحصائيات', 'modern-arabic-shop'); ?></span>
                </a>
                <a href="#products" data-section="products">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                    <span><?php _e('المنتجات', 'modern-arabic-shop'); ?></span>
                </a>
                <a href="#orders" data-section="orders">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span><?php _e('الطلبات', 'modern-arabic-shop'); ?></span>
                </a>
                <a href="#users" data-section="users">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span><?php _e('المستخدمين', 'modern-arabic-shop'); ?></span>
                </a>
                <a href="#settings" data-section="settings">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                    <span><?php _e('الإعدادات', 'modern-arabic-shop'); ?></span>
                </a>
            </nav>
        </aside>

        <!-- Left-side Main Viewport -->
        <main class="mas-portal-main" id="adminViewport">
            <div id="stats" class="mas-portal-section active">
                <?php include_once MAS_PLUGIN_DIR . 'includes/admin-dashboard.php';
                      mas_render_admin_dashboard(); ?>
            </div>

            <div id="products" class="mas-portal-section">
                <?php mas_render_product_management(); ?>
            </div>

            <div id="users" class="mas-portal-section">
                <?php mas_render_user_management(); ?>
            </div>
        </main>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $('.mas-portal-nav a').on('click', function(e) {
        e.preventDefault();
        var section = $(this).data('section');

        $('.mas-portal-nav a').removeClass('active');
        $(this).addClass('active');

        $('.mas-portal-section').removeClass('active');
        $('#' + section).addClass('active');
    });
});
</script>
