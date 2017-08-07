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
 

<?php if($settings->cb_dust_min_height) { ?>
.fl-node-<?php echo $id; ?> .cb-dust {
    height: <?php echo $settings->cb_dust_min_height; ?>px;
}
<?php } ?>


<?php if($settings->cb_dust_bg_color) { ?>
.fl-node-<?php echo $id; ?> .cb-dust {
    background: #<?php echo $settings->cb_dust_bg_color; ?>;
}
<?php } ?>


<?php if( 'content' == $settings->cb_dust_mouse ) { ?>
.fl-node-<?php echo $id; ?> .cb-dust .cb-dust__editor { 
	pointer-events: auto; 
}
<?php } ?>



