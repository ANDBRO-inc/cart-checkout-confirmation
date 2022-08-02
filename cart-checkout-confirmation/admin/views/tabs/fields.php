<?php if (!isset($fields)) $fields = []; ?>
<form action="" method="post">
    <div class="drag-main ui-tabs-panel version-<?php echo esc_attr($license); ?>">
        <div class="drag-row">
            <div class="drag-left">
                <?php foreach ($fields as $key => $group) : ?>
                    <?php $key_i18n = ''; ?>
                    <?php if (!$group) continue; ?>
                    <div class="group-fields" id="fields-<?php echo esc_attr($key); ?>">
                        <h3><?php
                            switch ($key) {
                                case 'billing' :
                                    echo esc_html__('Billing', 'cart-checkout-confirmation');
                                    $key_i18n = esc_html__('Billing', 'cart-checkout-confirmation');
                                    break;
                                case 'shipping' :
                                    echo esc_html__('Shipping', 'cart-checkout-confirmation');
                                    $key_i18n = esc_html__('Shipping', 'cart-checkout-confirmation');
                                    break;
                                case 'order' :
                                    echo esc_html__('Order', 'cart-checkout-confirmation');
                                    $key_i18n = esc_html__('Order', 'cart-checkout-confirmation');
                                    break;
                            }
                            ?>
                        </h3>
                        <?php foreach ($group as $field_key => $item): ?>
                            <div class="field-item" data-key="<?php echo esc_attr($field_key); ?>"
                                 data-group="<?php echo esc_attr($key_i18n); ?>">
                                <span><?php echo esc_attr($item['label']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="drag-right">
                <div class="drag-group">
                    <h3><?php echo esc_html__('Display fields', 'cart-checkout-confirmation'); ?></h3>

                    <div class="group-list" style="min-height: 500px">
                        <?php if ($display_fields) : ?>
                            <?php foreach ($display_fields as $field_key => $item): ?>
                                <div class="field-item" data-key="<?php echo esc_attr($field_key); ?>">
                                    <span><?php echo esc_attr($item); ?></span>
                                    <input type="hidden" name="fields[<?php echo esc_attr($field_key); ?>]"
                                           value="<?php echo esc_attr($item); ?>">
                                    <button type="button" name="remove_item" onclick="removeItem(this)"><span
                                                class="dashicons dashicons-trash"></span></button>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="save_config_fields" value="1"/>
                    <button type="submit"
                            class="button button-primary" <?php echo ($license == 'Free') ? 'disabled="disabled"' : ''; ?>><?php echo esc_html__('Save', 'cart-checkout-confirmation') ?></button>

                </div>
            </div>
        </div>
    </div>
</form>