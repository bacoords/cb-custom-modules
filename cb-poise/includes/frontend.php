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

 <?php if($settings->cb_poise_multiple_photos_field){ ?> 	
   <div class="cb-poise-container cb-poise-container-<?php echo $id; ?>">
   	<div class="cb-poise-row">
			<?php 
			$i = 0;
			foreach($settings->cb_poise_multiple_photos_field as $img) { 
			 $src = wp_get_attachment_image_src($img, 'full');
			 ?>
			 <div class="cb-poise-col">
				 <a href="<?php echo $src[0]; ?>" target="_self">
					 <?php echo wp_get_attachment_image($img, 'full', false, array('class'=>'cb-poise-img')); ?>
				 </a>
			 </div>
			<?php 
			$i++;
				if($i == $settings->cb_poise_text_field){
				?>
				 </div>
				 <div class="cb-poise-row"> 
				<?php
				}
			
			} ?>
		 </div>
   </div>
 <?php } ?>