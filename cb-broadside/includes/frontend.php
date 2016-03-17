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

 <?php if($settings->cb_broadside_multiple_photos_field){ ?> 	
    <div class="cb-broadside">
      <span class="scroll-left scroll-left-<?php echo $id; ?>">&#10094;</span>
      <span class="scroll-right scroll-right-<?php echo $id; ?>">&#10095;</span>
      <ul class="ul-<?php echo $id; ?>">
          <?php 
          foreach($settings->cb_broadside_multiple_photos_field as $img) { 
           $src = wp_get_attachment_image_src($img, 'full');
           ?>
               <li>
                <a href="<?php echo $src[0]; ?>"><?php echo wp_get_attachment_image($img, 'large', false, array('class'=>'cb-broadside-img')); ?></a>
              </li>
          <?php 

          } ?>
      </ul>
    </div>
 <?php } ?>

