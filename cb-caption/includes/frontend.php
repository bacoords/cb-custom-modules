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

<?php if(isset($settings->cb_caption_photo_src)){ ?>
 
	<div class="cb-caption-boxes">
	
		<div class="cb-caption-box-wrapper" >
		  
		  <div class="cb-caption-img-wrapper">
		    
		    <img src="<?php echo $settings->cb_caption_photo_src; ?>" alt="image">
		    
		  </div>
		  
			<?php if($settings->cb_caption_link_field){ ?>
			
			<a href="<?php echo $settings->cb_caption_link_field; ?>" class="cb-caption-box-overlay">
			
				<div class="cb-caption-box-inner">
				
					<?php echo $settings->cb_caption_editor_field; ?>
					
				</div>
				
			</a>
			
			<?php } else { ?>
			
			<div class="cb-caption-box-overlay">
			
				<div class="cb-caption-box-inner">
				
					<?php echo $settings->cb_caption_editor_field; ?>
					
				</div>
				
			</div>
			
			<?php } ?>
						
		</div>
		
	</div>
	
<?php } ?>  