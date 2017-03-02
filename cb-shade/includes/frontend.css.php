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
 


<?php 
/* Convert hexdec color string to rgb(a) string */
/* http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/ */


if($settings->cb_shade_color_field){
  $color = $settings->cb_shade_color_field;

  if ($color[0] == '#' ) {
    $color = substr( $color, 1 );
  }
  //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
          $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
  } elseif ( strlen( $color ) == 3 ) {
          $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
  } else {
          return $default;
  }

  //Convert hexadec to rgb
  $rgb =  array_map('hexdec', $hex);
  
  $color_8 = 'rgba('.implode(",",$rgb).',0.8)';
  $color_3 = 'rgba('.implode(",",$rgb).',0.3)';
  
} else {
  $color_8 = 'rgba(0,0,0,0.8)';
  $color_3 = 'rgba(0,0,0,0.3)';
}
?>

<?php if($settings->cb_shade_text_field) { ?>

.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper {
    min-height: <?php echo $settings->cb_shade_text_field; ?>px;
    _height: <?php echo $settings->cb_shade_text_field; ?>px;
}

.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay {
    min-height: <?php echo $settings->cb_shade_text_field; ?>px;
    _height: <?php echo $settings->cb_shade_text_field; ?>px;
}

.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay .cb-shade-box-inner {
    min-height: <?php echo $settings->cb_shade_text_field; ?>px;
    _height: <?php echo $settings->cb_shade_text_field; ?>px;
}



<?php }  ?>



<?php if($settings->cb_shade_vertical_align) { ?>
.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay .cb-shade-box-inner {
    -webkit-box-pack: <?php echo $settings->cb_shade_vertical_align ?>;    -webkit-justify-content: <?php echo $settings->cb_shade_vertical_align ?>;    -ms-flex-pack: <?php echo $settings->cb_shade_vertical_align ?>;    justify-content: <?php echo $settings->cb_shade_vertical_align ?>;
}
<?php }  ?>


<?php if($settings->cb_shade_secret == 'on') { ?>
.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay .cb-shade-box-inner {
   opacity: 0;
}
.fl-node-<?php echo $id; ?> .cb-shade-boxes:hover .cb-shade-box-wrapper .cb-shade-box-overlay .cb-shade-box-inner {
    opacity: 1;
}
<?php }  ?>




.fl-node-<?php echo $id; ?> .cb-shade-boxes { background: <?php echo $color_8; ?>; }
.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay { background: <?php echo $color_3; ?>; }
.fl-node-<?php echo $id; ?> .cb-shade-boxes .cb-shade-box-wrapper .cb-shade-box-overlay:hover { background: <?php echo $color_8; ?>; }


