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
<div class="fl-example-text" style="background:url(<?php echo $settings->cb_shade_photo_field_src; ?>) no-repeat center; background-size:cover;">
  <a href="<?php echo $settings->cb_shade_link_field; ?>">
    <?php echo $settings->cb_shade_editor_field; ?>
	</a>
</div>