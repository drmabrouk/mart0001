<?php
/**
 * Order History & Tracking Template
 */
if (!defined('ABSPATH')) exit;

$args = array(
    'post_type' => 'shop_order',
    'author'    => get_current_user_id(),
    'posts_per_page' => -1,
);
$orders = new WP_Query($args);
?>

<div class="mas-order-history">
    <h2><?php _e('طلباتي', 'modern-arabic-shop'); ?></h2>

    <?php if ($orders->have_posts()) : ?>
        <div class="mas-order-list">
            <?php while ($orders->have_posts()) : $orders->the_post();
                $order_id = get_the_ID();
                $serial = get_post_meta($order_id, '_order_serial', true);
                $status = get_post_meta($order_id, '_order_status', true);
                $total = get_post_meta($order_id, '_total', true);
            ?>
                <div class="mas-order-card mas-rounded" data-order-id="<?php echo $order_id; ?>">
                    <div class="mas-order-header">
                        <span class="mas-order-serial">#<?php echo esc_html($serial); ?></span>
                        <span class="mas-order-status mas-status-<?php echo esc_html($status); ?>">
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

                    <div class="mas-order-summary">
                        <p><?php _e('الإجمالي', 'modern-arabic-shop'); ?>: <?php echo esc_html($total); ?> <?php _e('ج.م', 'modern-arabic-shop'); ?></p>
                    </div>

                    <div class="mas-order-actions">
                        <button class="mas-view-invoice mas-button" data-id="<?php echo $order_id; ?>"><?php _e('عرض الفاتورة', 'modern-arabic-shop'); ?></button>
                        <?php if ($status === 'pending') : ?>
                            <button class="mas-cancel-order mas-button mas-button-danger" data-id="<?php echo $order_id; ?>"><?php _e('إلغاء الطلب', 'modern-arabic-shop'); ?></button>
                        <?php endif; ?>
                    </div>

                    <div class="mas-order-tracking-lifecycle">
                        <div class="mas-track-step <?php echo in_array($status, ['pending', 'processing', 'shipped', 'delivered']) ? 'active' : ''; ?>"></div>
                        <div class="mas-track-step <?php echo in_array($status, ['processing', 'shipped', 'delivered']) ? 'active' : ''; ?>"></div>
                        <div class="mas-track-step <?php echo in_array($status, ['shipped', 'delivered']) ? 'active' : ''; ?>"></div>
                        <div class="mas-track-step <?php echo $status === 'delivered' ? 'active' : ''; ?>"></div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <p><?php _e('لا توجد طلبات سابقة.', 'modern-arabic-shop'); ?></p>
    <?php endif; ?>
</div>
