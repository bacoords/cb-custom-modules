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


	<div class="cb-shade-boxes">
		<div class="cb-shade-box-wrapper" style="background:url(<?php echo $settings->cb_shade_photo_field_src; ?>) no-repeat center; background-size:cover;">
		
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