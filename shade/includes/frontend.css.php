/**
 * This file should contain frontend styles that 
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file: 
 * 
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example: 
 */

<?php if($settings->cb_shade_text_field;) { ?>

.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper {
    min-height: <?php echo $settings->cb_shade_text_field; ?>px;
}

.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay {
    min-height: <?php echo $settings->cb_shade_text_field; ?>px;
}

.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay .cb-shade-box-inner {
    min-height: <?php echo $settings->cb_shade_text_field; ?>px;
}


<?php } ?>