<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('New Address Book', 'wedevs-academy'); ?></h1>

    <form method="POST" action="">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Name', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e('Address', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <textarea class="regular-text" name="address" id="address" cols="20" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e('Phone', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="">
                   
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
        wp_nonce_field('new-address');
        submit_button(__('Add Address', 'wedevs-academy'), 'primary', 'submit_address');
        ?>
    </form>
</div>