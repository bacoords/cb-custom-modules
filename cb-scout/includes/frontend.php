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
<?php if(isset($settings->cb_scout_form_field_repeater[0]->cb_scout_link_text)){ ?> 
  <div class="cb-scout-placeholder"></div>
  <div class="cb-scout">
      <ul>
          <?php
              $f = true;
              foreach($settings->cb_scout_form_field_repeater as $current_form){	?>
							 <li class="cb-scout__li-<?php echo $id; ?>">
							 		<a href="<?php echo $current_form->cb_scout_link_url; ?>">
							 		  <?php echo $current_form->cb_scout_link_text; ?>
							 		</a>
							 	</li>
					<?php	} ?>
      </ul>   
  </div>
  



<?php	} ?>