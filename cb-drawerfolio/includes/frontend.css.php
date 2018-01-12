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


 function converttorgba($color, $opacity = 100){

   if( $color == NULL ){
     return 'none';
   }

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
   $new_opac = ($opacity / 100);

   return 'rgba('.implode(",",$rgb).','. $new_opac .')';
 }
 ?>

 .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li{
   height: <?php echo $settings->photo_height; ?>px;
 }

 .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li .inner{
   height: <?php echo $settings->photo_height; ?>px;
 }





.fl-node-<?php echo $id; ?> .cb-drawerfolio .caption{
  color: #<?php echo $settings->caption_text_color; ?>;
  background-color: <?php echo converttorgba($settings->caption_bg_color, $settings->caption_bg_opacity); ?>;
}



.fl-node-<?php echo $id; ?> .cb-drawerfolio li:hover .caption{
  background-color: <?php echo converttorgba($settings->caption_bg_hover_color, $settings->caption_bg_hover_opacity); ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio li.show .caption{
  background-color: <?php echo converttorgba($settings->caption_bg_hover_color, $settings->caption_bg_hover_opacity); ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio li.show .caption--arrow{
  border-top-color: <?php echo converttorgba($settings->caption_bg_hover_color, $settings->caption_bg_hover_opacity); ?>;
}




.fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer{
  background-color: #<?php echo $settings->drawer_bg_color; ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer * {
  color: #<?php echo $settings->drawer_text_color; ?>;
}




<?php if( isset($settings->caption_title_font)) { $font = $settings->caption_title_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--title{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( isset($settings->caption_subtitle_font)) { $font = $settings->caption_subtitle_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--subtitle{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( isset($settings->drawer_title_font)) { $font = $settings->drawer_title_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--title{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>


<?php if( isset($settings->drawer_content_font)) { $font = $settings->drawer_content_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--content * {
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>





<?php if( isset($settings->caption_title_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--title{
    font-size: <?php echo $settings->caption_title_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->caption_subtitle_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--subtitle{
    font-size: <?php echo $settings->caption_subtitle_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->drawer_title_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--title{
    font-size: <?php echo $settings->drawer_title_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->drawer_content_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--content *{
    font-size: <?php echo $settings->drawer_content_size; ?>px;
  }
<?php } ?>





@media(min-width:<?php echo $module->responsive_breakpoint(); ?>px){
  .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li{
    width: 33.333333333%;
  }
  .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li .drawer--content{
    column-count: 2;
    column-gap:40px;
  }
}
@media(min-width:1080px){
  .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li{
    width: <?php echo $settings->columns; ?>%;
  }
}
