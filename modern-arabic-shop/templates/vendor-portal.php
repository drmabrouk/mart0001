<?php
/**
 * Vendor Portal Template (Frontend)
 */
if (!defined('ABSPATH')) exit;
?>

<div class="mas-vendor-portal mas-rounded">
    <header class="mas-portal-header">
        <h2><?php _e('بوابة التاجر', 'modern-arabic-shop'); ?></h2>
    </header>

    <div class="mas-portal-grid">
        <aside class="mas-portal-sidebar">
            <nav class="mas-portal-nav">
                <a href="#inventory" class="active"><?php _e('المخزون', 'modern-arabic-shop'); ?></a>
                <a href="#add-product"><?php _e('إضافة منتج', 'modern-arabic-shop'); ?></a>
                <a href="#sales"><?php _e('المبيعات', 'modern-arabic-shop'); ?></a>
            </nav>
        </aside>

        <main class="mas-portal-main">
            <div id="inventory" class="mas-portal-section">
                <h3><?php _e('إدارة المخزون', 'modern-arabic-shop'); ?></h3>
                <!-- Vendor specific inventory management logic -->
                <p><?php _e('هنا يمكنك إدارة منتجاتك ومتابعة مبيعاتك.', 'modern-arabic-shop'); ?></p>
            </div>
        </main>
    </div>
</div>
