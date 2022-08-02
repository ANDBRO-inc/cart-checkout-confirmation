<div class="drag-main ui-tabs-panel">
    <h3><?php echo esc_html__('Display Option', 'cart-checkout-confirmation'); ?></h3>
    <form action="" method="POST">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label><?php echo esc_html__('Type', 'cart-checkout-confirmation'); ?></label>
                </th>
                <td>
                    <input type="radio" id="popup" name="option[type]"
                           value="popup" <?php if ($option['type'] == 'popup') echo 'checked' ?>/>
                    <label for="popup"
                           style="margin-right: 20px;"><?php echo esc_html__('Popup', 'cart-checkout-confirmation'); ?></label>
                    <input type="radio" id="redirect" name="option[type]"
                           value="redirect" <?php if ($option['type'] == 'redirect') echo 'checked' ?> <?php if ($license == 'Free' || !$license) echo 'disabled' ?>/>
                    <label for="redirect"><?php echo esc_html__('Redirect to confirm page', 'cart-checkout-confirmation'); ?></label>
                </td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="submit_option_form" value="1"/>
        <button class="button button-primary"
                type="submit"><?php echo esc_html__('Save', 'cart-checkout-confirmation'); ?></button>
    </form>
</div>