<?php
/**
 * Proprietary Admin Panel Template
 */
if (!defined('ABSPATH')) exit;
?>

<div class="mas-admin-portal mas-rounded">
    <header class="mas-portal-header">
        <h2><?php _e('لوحة التحكم الاحترافية', 'modern-arabic-shop'); ?></h2>
    </header>

    <div class="mas-portal-grid">
        <aside class="mas-portal-sidebar">
            <nav class="mas-portal-nav">
                <a href="#stats" class="active"><?php _e('الإحصائيات', 'modern-arabic-shop'); ?></a>
                <a href="#products"><?php _e('إدارة المنتجات', 'modern-arabic-shop'); ?></a>
                <a href="#orders"><?php _e('الطلبات', 'modern-arabic-shop'); ?></a>
                <a href="#users"><?php _e('المستخدمين', 'modern-arabic-shop'); ?></a>
            </nav>
        </aside>

        <main class="mas-portal-main">
            <div id="stats" class="mas-portal-section">
                <?php include MAS_PLUGIN_DIR . 'includes/admin-dashboard.php';
                      mas_render_admin_dashboard(); ?>
            </div>
            <!-- Additional sections would be handled here -->
        </main>
    </div>
</div>

<style>
.mas-admin-portal { background: #fff; border: 1px solid #eee; overflow: hidden; margin-top: 20px; }
.mas-portal-header { background: #007cba; color: #fff; padding: 20px; }
.mas-portal-header h2 { margin: 0; color: #fff; }
.mas-portal-grid { display: flex; min-height: 500px; }
.mas-portal-sidebar { width: 200px; background: #f8f8f8; border-left: 1px solid #eee; }
.mas-portal-nav a { display: block; padding: 15px 20px; text-decoration: none; color: #444; border-bottom: 1px solid #eee; }
.mas-portal-nav a.active { background: #fff; color: #007cba; font-weight: bold; border-left: 3px solid #007cba; }
.mas-portal-main { flex-grow: 1; padding: 30px; }
</style>
