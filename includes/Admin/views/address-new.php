<div class="wrap">
    <h1><?php _e( 'New Address', 'wedevs-academy' ); ?></h1>

<!--    --><?php //var_dump( $this->errors ) ?>

    <form class="" action="" method="POST">
        <table class="form-table">
            <tbody>
                <tr class="row<?php echo$this->has_error( 'name' ) ? ' form-invalid' : ''; ?>">
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'wedevs-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="text" class="regular-text" name="name" id="name" value="" placeholder="Enter your name">
                        <?php
                        if ( $this->has_error('name') ) {
                            ?>
                            <p class="description error"><?php echo $this->get_error('name') ?></p>
                            <?php
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e( 'Phone', 'wedevs-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="text" class="regular-text" name="phone" id="phone" value="" placeholder="Enter your phone">
                        <?php
                        if ( $this->has_error('phone') ) {
                            ?>
                            <p class="description error"><?php echo $this->get_error('phone') ?></p>
                            <?php
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="address"><?php _e( 'Address', 'wedevs-academy' ); ?></label>
                    </th>
                    <td>
                        <textarea type="text" class="regular-text" name="address" id="address" value="" placeholder="Enter your address"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php wp_nonce_field( 'new-address' ); ?>
        <?php submit_button( __('Add Address', 'wedevs-academy'), 'primary', 'submit_address' ); ?>
    </form>
</div>