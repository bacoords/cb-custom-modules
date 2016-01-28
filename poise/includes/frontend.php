<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */

?>
<!--
<div class="fl-example-text">
  <div style="background:url(<?php echo $settings->cb_shade_photo_field_src; ?>) no-repeat center; background-size:cover;">
		<a href="<?php echo $settings->cb_shade_link_field; ?>">
			<?php echo $settings->cb_shade_editor_field; ?>
		</a>
	</div>
</div>
-->
	
   <div class="cb-poise-row">
    <?php foreach($settings->cb_poise_multiple_photos_field as $img) { ?>
     <div class="cb-poise-col">
       <img src="<?php wp_get_attachment_image($img, 'full'); ?>" alt="App Screenshot" class="cb-poise-img">
     </div>
		<?php } ?>
   </div>