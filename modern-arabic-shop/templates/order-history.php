<?php
/**
 * Order History & Tracking Template - Professional Card View
 */
if (!defined('ABSPATH')) exit;

global $wpdb;
$current_user_id = get_current_user_id();

// Zero-cache direct DB query
$orders_raw = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->posts}
     WHERE post_type = 'shop_order'
     AND post_author = %d
     AND post_status = 'publish'
     ORDER BY post_date DESC",
    $current_user_id
));
?>

<div class="mas-order-history">
    <header class="mas-module-header">
        <h2><?php _e('سجل الطلبات', 'modern-arabic-shop'); ?></h2>
    </header>

    <?php if ($orders_raw) : ?>
        <div class="mas-order-list">
            <?php foreach ($orders_raw as $order) :
                $order_id = $order->ID;
                $serial = get_post_meta($order_id, '_order_serial', true);
                $status = get_post_meta($order_id, '_order_status', true);
                $total = get_post_meta($order_id, '_total', true);
            ?>
                <div class="mas-order-card mas-rounded">
                    <div class="mas-order-card-header">
                        <div class="mas-order-info-primary">
                            <span class="mas-order-serial">#<?php echo esc_html($serial); ?></span>
                            <span class="mas-order-date"><?php echo get_the_date('', $order_id); ?></span>
                        </div>
                        <span class="mas-order-status-badge mas-status-<?php echo esc_html($status); ?>">
                            <?php
                            $status_labels = array(
                                'pending'    => __('قيد الانتظار', 'modern-arabic-shop'),
                                'processing' => __('قيد التنفيذ', 'modern-arabic-shop'),
                                'shipped'    => __('تم الشحن', 'modern-arabic-shop'),
                                'delivered'  => __('تم التوصيل', 'modern-arabic-shop'),
                                'cancelled'  => __('ملغي', 'modern-arabic-shop'),
                            );
                            echo isset($status_labels[$status]) ? $status_labels[$status] : $status;
                            ?>
                        </span>
                    </div>

                    <div class="mas-order-card-body">
                        <div class="mas-order-summary-row">
                            <span><?php _e('إجمالي التكلفة', 'modern-arabic-shop'); ?>:</span>
                            <span class="mas-order-total-value"><?php echo esc_html($total); ?> ج.م</span>
                        </div>
                    </div>

                    <div class="mas-order-card-actions">
                        <button class="mas-button mas-view-order-details" data-id="<?php echo $order_id; ?>"><?php _e('تفاصيل الطلب', 'modern-arabic-shop'); ?></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="mas-empty-state mas-rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <p><?php _e('لم تقم بأي طلبات بعد.', 'modern-arabic-shop'); ?></p>
            <a href="<?php echo home_url('/home'); ?>" class="mas-button"><?php _e('ابدأ التسوق', 'modern-arabic-shop'); ?></a>
        </div>
    <?php endif; ?>
</div>
