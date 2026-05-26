<?php
/**
 * Digital Invoice Template
 */
if (!defined('ABSPATH')) exit;

$order_id = get_the_ID();
$serial = get_post_meta($order_id, '_order_serial', true);
$subtotal = get_post_meta($order_id, '_subtotal', true);
$tax = get_post_meta($order_id, '_tax', true);
$delivery = get_post_meta($order_id, '_delivery_fee', true);
$total = get_post_meta($order_id, '_total', true);
?>

<div class="mas-invoice-view mas-rounded">
    <div class="mas-invoice-header">
        <h1><?php _e('فاتورة الطلب', 'modern-arabic-shop'); ?></h1>
        <p class="mas-invoice-serial">#<?php echo esc_html($serial); ?></p>
    </div>

    <div class="mas-invoice-body">
        <table class="mas-invoice-table">
            <thead>
                <tr>
                    <th><?php _e('المنتج', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('الكمية', 'modern-arabic-shop'); ?></th>
                    <th><?php _e('السعر', 'modern-arabic-shop'); ?></th>
                </tr>
            </thead>
            <tbody>
                <!-- Items would be looped here -->
                <tr>
                    <td><?php _e('منتج عينة', 'modern-arabic-shop'); ?></td>
                    <td>1</td>
                    <td>100 <?php _e('ريال', 'modern-arabic-shop'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mas-invoice-footer">
        <div class="mas-invoice-row">
            <span><?php _e('المجموع الفرعي', 'modern-arabic-shop'); ?>:</span>
            <span><?php echo esc_html($subtotal); ?> <?php _e('ريال', 'modern-arabic-shop'); ?></span>
        </div>
        <div class="mas-invoice-row">
            <span><?php _e('الضريبة', 'modern-arabic-shop'); ?>:</span>
            <span><?php echo esc_html($tax); ?> <?php _e('ريال', 'modern-arabic-shop'); ?></span>
        </div>
        <div class="mas-invoice-row">
            <span><?php _e('رسوم التوصيل', 'modern-arabic-shop'); ?>:</span>
            <span><?php echo esc_html($delivery); ?> <?php _e('ريال', 'modern-arabic-shop'); ?></span>
        </div>
        <div class="mas-invoice-total mas-rounded">
            <span><?php _e('الإجمالي النهائي', 'modern-arabic-shop'); ?>:</span>
            <span><?php echo esc_html($total); ?> <?php _e('ريال', 'modern-arabic-shop'); ?></span>
        </div>
    </div>
</div>
