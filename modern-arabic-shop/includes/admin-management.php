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

function mas_render_user_management() {
    ?>
    <div class="wrap">
        <h1><?php _e('إدارة أدوار المستخدمين', 'modern-arabic-shop'); ?></h1>
        <p><?php _e('تعيين وتعديل أدوار الزبائن والتجار.', 'modern-arabic-shop'); ?></p>
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
                <?php if (empty($users)) : ?>
                <tr>
                    <td colspan="4"><?php _e('لم يتم العثور على زبائن أو تجار.', 'modern-arabic-shop'); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function mas_render_system_logs() {
    ?>
    <div class="wrap">
        <h1><?php _e('سجلات النظام', 'modern-arabic-shop'); ?></h1>
        <div class="mas-log-container mas-rounded" style="background:#000; color:#0f0; padding:20px; font-family:monospace; margin-top:20px;">
            <p>[<?php echo date('Y-m-d H:i:s'); ?>] <?php _e('تم تفعيل الإضافة وتسجيل الأدوار.', 'modern-arabic-shop'); ?></p>
            <p>[<?php echo date('Y-m-d H:i:s'); ?>] <?php _e('تم إنشاء الصفحة الرئيسية للمتجر تلقائياً.', 'modern-arabic-shop'); ?></p>
        </div>
    </div>
    <?php
}
