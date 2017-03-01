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
 */
 
 

.fl-node-<?php echo $id; ?> .cb-modal .cb-modal-box{
   background: url(<?php echo wp_get_attachment_url( $settings->cb_modal_photo ); ?>) no-repeat center;
   background-size: cover;
}
 
 
 


<?php 
/* Convert hexdec color string to rgb(a) string */
/* http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/ */


if($settings->cb_modal_bgcolor){
  $color = $settings->cb_modal_bgcolor;

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
  
  $bg_color_start = 'rgba('.implode(",",$rgb).',0.3)';
  $bg_color_end = 'rgba('.implode(",",$rgb).',1)';
  
} else {
  $bg_color_start = 'rgba(256,256,256,0.3)';
  $bg_color_end = 'rgba(256,256,256,1)';
}

if($settings->cb_modal_overlaycolor){
  $color = $settings->cb_modal_overlaycolor;

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
  
  $overlay_color = 'rgba('.implode(",",$rgb).',0.8)';
  
} else {
  $overlay_color = 'rgba(0,0,0,0.8)';
}
?>


.fl-node-<?php echo $id; ?> .cb-modal .cb-modal-box__inner {
   background: <?php echo $bg_color_end; ?>;
   background: -moz-linear-gradient(to bottom, <?php echo $bg_color_start; ?> 0%,  <?php echo $bg_color_end; ?> 40%);
   background: -webkit-linear-gradient(to bottom, <?php echo $bg_color_start; ?> 0%,  <?php echo $bg_color_end; ?> 40% );
   background: linear-gradient(to bottom, <?php echo $bg_color_start; ?> 0%,  <?php echo $bg_color_end; ?> 40% );
}


.fl-node-<?php echo $id; ?> .cb-modal .cb-modal-overlay {
   background-color: <?php echo $overlay_color; ?>;
}







<?php   if($settings->cb_modal_photo_align !== 'center'){ ?>

    .fl-node-<?php echo $id; ?> .cb-modal .cb-modal-thumb img {
       float: <?php echo $settings->cb_modal_photo_align; ?>;
    }  

<?php   } else {  ?>

    .fl-node-<?php echo $id; ?> .cb-modal .cb-modal-thumb img {
       margin-left: auto;
       margin-right: auto;
    }    

<?php   }  ?>




<?php   if(!$settings->cb_modal_textcolor){  ?>

    .fl-node-<?php echo $id; ?> .cb-modal .cb-modal-box__description {
       color: #000000;
    }  

    .fl-node-<?php echo $id; ?> .cb-modal .cb-modal-box__description * {
       color: #000000;
    }  

<?php   } else {  ?>

    .fl-node-<?php echo $id; ?> .cb-modal .cb-modal-box__description {
       color: #<?php echo $settings->cb_modal_textcolor; ?>;
    }    

    .fl-node-<?php echo $id; ?> .cb-modal .cb-modal-box__description * {
       color: #<?php echo $settings->cb_modal_textcolor; ?>;
    }    

<?php    }   ?>




