<?php if (!is_admin() || is_ajax()) : ?>
    <?php
    $display_fields = get_option('check_confirm_page_fields_setting');
    if (get_option('license_checkout_confirm', '') == 'Free' || !is_plugin_active('cart-checkout-confirmation-pro/cart-checkout-confirmation-pro.php') ) {
        $display_fields = Checkout_Confirm::get_free_fields();
    }
    $customer = WC()->session->get('customer');
    ?>
    <div class="checkout-confirm-wrap">
        <h3><?php echo esc_html__('Customer information', 'cart-checkout-confirmation') ?></h3>
        <table>
            <?php if ($display_fields): ?>
                <?php foreach ($display_fields as $key => $label) : ?>
                    <?php if (preg_match('/^billing_+(.*)/', $key)) $key = str_replace('billing_', '', $key); ?>
                    <tr>
                        <td>
                            <label for="<?php echo esc_attr($key); ?>"><?php echo esc_attr($label); ?></label>
                        </td>
                        <td>
                            <?php echo esc_attr($customer[$key]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <h3><?php echo esc_html__('Cart information', 'cart-checkout-confirmation') ?></h3>
        <table>
            <thead>
            <tr>
                <th class="product-name"><?php echo esc_html__('Product', 'cart-checkout-confirmation') ?></th>
                <th class="product-price"><?php echo esc_html__('Price', 'cart-checkout-confirmation') ?></th>
                <th class="product-quantity"><?php echo esc_html__('Quantity', 'cart-checkout-confirmation') ?></th>
                <th class="product-subtotal"><?php echo esc_html__('Subtotal', 'cart-checkout-confirmation') ?></th>
            </tr>
            </thead>
            <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>
                <tr>
                    <?php $product = $cart_item['data']; ?>
                    <td><?php echo esc_attr($product->name); ?></td>
                    <td><?php echo WC()->cart->get_product_price($product); ?></td>
                    <td><?php echo esc_attr($cart_item['quantity']); ?></td>
                    <td><?php echo WC()->cart->get_product_subtotal($product, $cart_item['quantity']); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><?php echo esc_html__("Subtotal", 'cart-checkout-confirmation'); ?></td>
                <td><?php echo WC()->cart->get_cart_subtotal(); ?></td>
            </tr>
            <?php $discount = WC()->cart->get_discount_total(); ?>
            <?php if ($discount > 0) : ?>
                <tr>
                    <td colspan="3"><?php echo esc_html__("Discount", 'cart-checkout-confirmation') ?></td>
                    <td><?php echo esc_attr($discount); ?></td>
                </tr>
            <?php endif; ?>
        </table>
        <?php if (!is_ajax()) : ?>
            <div class="confirm-button-groups">
                <div class="button-left">
                    <a href="#"
                       class="cc-button-back button-back"><?php echo esc_html__("Back", 'cart-checkout-confirmation'); ?></a>
                </div>
                <div class="center-button">
                    <button style="background: #1262a2;color: #fff;width: 250px;"
                            class="place_order button-place_order"><?php echo esc_html__('Place order', 'cart-checkout-confirmation') ?></button>
                </div>
                <div class="button-right"></div>
            </div>
            <div class="confirm-overlay"></div>
        <?php endif; ?>
    </div>
<?php endif; ?>
