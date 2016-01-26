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

.fl-node-<?php echo $id; ?> {
    font-size: <?php echo $settings->text_field; ?>px;
}

<?php $module->example_method(); ?>