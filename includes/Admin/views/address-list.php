<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Address Book', 'wedevs-academy' ); ?></h1>
    <a href="<?php echo admin_url( 'admin.php?page=wedevs-academy&action=new' ); ?>" class="page-title-action"><?php _e( 'Add New', 'wedevs-academy' ); ?></a>

    <form action="" method="POST">
        <?php
            $table = new WeDevs\Academy\Admin\AddressList();
            $table->prepare_items();
            $table->display();
        ?>
    </form>

</div>