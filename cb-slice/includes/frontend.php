<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 *  
 */

?>

 <?php if($settings->cb_slice_multiple_photos_field){ 
  $row_limit = $settings->cb_slice_row_limit;
  $img_count = 0;                                                  
  $row_count = 1;
?> 	
    <div id="cb-slice-<?php echo $id; ?>" class="cb-slice">

      <div class="cb-slice-row-case cb-slice-row-case-<?php echo $row_count ?>">
          <?php 
          foreach($settings->cb_slice_multiple_photos_field as $img) { 
           $srclink = wp_get_attachment_image_src($img, 'full');
           $srcbg = wp_get_attachment_image_src($img, 'large');
            
            $img_count++;
           ?>
              <div class="cb-slice-img-wrapper">
                <div style="background:url(<?php echo $srcbg[0]; ?>) no-repeat center; background-size:cover;" class="cb-slice-img cb-slice-row-<?php echo $row_count ?> cb-slice-item-<?php echo $img_count ?>">
                  <div class="cb-slice-inner">
                    <a href="<?php echo $srclink[0]; ?>" class="venobox cb-slice-link vbox-item" data-gall="myGallery" title=""></a>
                  </div>
                </div>
              </div>
            
              
          <?php 
            if($img_count == $row_limit){
              $row_count++;
              $img_count = 0;
              ?>
          </div>
          <div class="cb-slice-row-case cb-slice-row-case-<?php echo $row_count ?>">
              <?php
            }
            
          } ?>
      </div>
    </div>
 <?php } ?>
