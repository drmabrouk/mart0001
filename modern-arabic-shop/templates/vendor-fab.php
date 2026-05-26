<?php
/**
 * Vendor Floating Action Button (FAB) Template
 */
?>
<div class="mas-vendor-fab-container">
    <button class="mas-vendor-fab" id="masVendorFab">
        <span class="dashicons dashicons-plus"></span>
    </button>
    <div class="mas-vendor-menu" id="masVendorMenu">
        <a href="<?php echo admin_url('post-new.php?post_type=shop_product'); ?>" class="mas-vendor-menu-item">
            <span class="dashicons dashicons-plus-alt"></span>
            <?php _e('إضافة منتج', 'modern-arabic-shop'); ?>
        </a>
        <a href="<?php echo admin_url('edit.php?post_type=shop_product'); ?>" class="mas-vendor-menu-item">
            <span class="dashicons dashicons-archive"></span>
            <?php _e('المخزون', 'modern-arabic-shop'); ?>
        </a>
        <a href="<?php echo admin_url('edit.php?post_type=shop_product'); ?>" class="mas-vendor-menu-item">
            <span class="dashicons dashicons-edit"></span>
            <?php _e('تعديل', 'modern-arabic-shop'); ?>
        </a>
    </div>
</div>

<script>
document.getElementById('masVendorFab').addEventListener('click', function() {
    var menu = document.getElementById('masVendorMenu');
    menu.classList.toggle('active');
});
</script>
