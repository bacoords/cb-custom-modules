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

<?php if(isset($settings->cb_shade_photo_field_src)){ ?> 
	<div class="cb-shade-boxes">
		<div class="cb-shade-box-wrapper" style="background:url(<?php echo $settings->cb_shade_photo_field_src; ?>) no-repeat <?php echo $settings->cb_shade_bg_align; ?>; background-size:<?php echo $settings->cb_shade_bg_size; ?>;">
		
			<?php if($settings->cb_shade_link_field){ ?>
			<a href="<?php echo $settings->cb_shade_link_field; ?>" class="cb-shade-box-overlay">
				<div class="cb-shade-box-inner">
					<?php echo $settings->cb_shade_editor_field; ?>
				</div>
			</a>
			<?php } else { ?>
			<div class="cb-shade-box-overlay">
				<div class="cb-shade-box-inner">
					<?php echo $settings->cb_shade_editor_field; ?>
				</div>
			</div>
			<?php } ?>			
		</div>
	</div>
<?php } ?>  