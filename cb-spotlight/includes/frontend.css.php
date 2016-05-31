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
@media(min-width:600px){
  .cb-spotlight-spn-gallery .cb-spotlight-column-one {
    width: <?php echo substr($settings->cb_spotlight_column_widths, 0, 2) ?>%;
  }
  .cb-spotlight-spn-gallery .cb-spotlight-column-two {
    width: <?php echo substr($settings->cb_spotlight_column_widths, 3, 2) ?>%;
  }
}