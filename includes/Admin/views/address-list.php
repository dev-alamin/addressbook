<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Address Book', 'wedevs-academy'); ?></h1>
    <?php if( isset( $_GET['inserted'])): ?>
    <div class="notice notice-success">
        <p><?php _e( 'Address has been inserted successfully', 'wedevs-academy'); ?></p>
    </div>
    <?php endif; ?>

    <?php if( isset( $_GET['address-deleted']) && $_GET['address-deleted'] == true): ?>
    <div class="notice notice-success">
        <p><?php _e( 'Address deleted successfully', 'wedevs-academy'); ?></p>
    </div>
    <?php endif; ?>
    <a class="page-title-action" href="http://localhost/wp/wp-admin/admin.php?page=wedevs-academy&action=new"><?php _e('Add  New', 'wedevs-academy'); ?></a>

    <form action="" method="POST">
        <?php 
        $table = new \Wedevs\Academy\Admin\Address_List();
        $table->preapre_items();
        $table->display();
        ?>
    </form>
</div>