<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Edit Address', 'wedevs-academy'); ?></h1>
   <?php if( isset( $_GET['address-updated'])): ?>
    <div class="notice notice-success">
        <p><?php _e( 'Address has been updated successfully', 'wedevs-academy'); ?></p>
    </div>
    <?php endif; ?>
    <form method="POST" action="">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Name', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="<?php echo esc_attr( $address->name ); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e('Address', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <textarea class="regular-text" name="address" id="address" cols="20" rows="5"><?php echo esc_textarea( $address->address ); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e('Phone', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr( $address->phone ); ?>">
                    </td>
                </tr>
            </tbody>
        </table>
    <input type="hidden" name="id" value="<?php echo esc_attr( $address->id ); ?>">
<?php
        wp_nonce_field('new-address');
        submit_button(__('Update Address', 'wedevs-academy'), 'primary', 'submit_address');
        ?>
    </form>
</div>