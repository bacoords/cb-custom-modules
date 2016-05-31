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




.fl-node-<?php echo $id; ?> .cb-broadside .ul{
  background: #<?php echo $settings->cb_broadside_bg_color; ?>;
}