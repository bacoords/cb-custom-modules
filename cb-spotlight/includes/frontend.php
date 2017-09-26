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
<?php if(isset($settings->cb_spotlight_form_field_repeater[0]->cb_spotlight_photo_field_src)){ ?> 
	<div class="cb-spotlight-spn-gallery">
  <?php if($settings->cb_spotlight_column_order == 'phtx'){ ?>      
      <div class="cb-spotlight-spn-image cb-spotlight-column-one">
     	  <img src="<?php echo $settings->cb_spotlight_form_field_repeater[0]->cb_spotlight_photo_field_src; ?>" alt="Image Spotlight" id="cb-spotlight-spn-img-<?php echo $id; ?>"/>
      </div>
      <div class="cb-spotlight-spn-links cb-spotlight-column-two">
        <div class="cb-spotlight-header"><h3><?php echo $settings->cb_spotlight_text_field; ?></h3></div>
					<?php
              $f = true;
              foreach($settings->cb_spotlight_form_field_repeater as $current_form){	?>
							 <a class="cb-spotlight-spn-link cb-spotlight-spn-link-<?php echo $id; ?> <?php if($f){ echo 'active'; $f = false;} ?>" data-img-src="<?php echo $current_form->cb_spotlight_photo_field_src; ?>">
							 		
							 		<?php echo $current_form->cb_spotlight_text_field; ?>
							 	</a>
					<?php	} ?>
  		</div>
  <?php	} else { ?>
      <div class="cb-spotlight-spn-links cb-spotlight-column-one">
        <div class="cb-spotlight-header"><h3><?php echo $settings->cb_spotlight_text_field; ?></h3></div>
			<?php
              $f = true;
              foreach($settings->cb_spotlight_form_field_repeater as $current_form){	?>
				 <a 
					class="cb-spotlight-spn-link cb-spotlight-spn-link-<?php echo $id; ?> <?php if($f){ echo 'active'; $f = false;} ?>" 
					data-img-src="<?php echo $current_form->cb_spotlight_photo_field_src; ?>" 
					<?php if ( function_exists( 'wr2x_get_retina_from_url' ) ) { 
						echo 'data-img-retina="' . wr2x_get_retina_from_url( $current_form->cb_spotlight_photo_field_src ) . '"'; } ?>
					>

						<?php echo $current_form->cb_spotlight_text_field; ?>
					</a>
			<?php } ?>
  		</div> 
     
      <div class="cb-spotlight-spn-image cb-spotlight-column-two">
     	  <img src="<?php echo $settings->cb_spotlight_form_field_repeater[0]->cb_spotlight_photo_field_src; ?>" alt="Image Spotlight" id="cb-spotlight-spn-img-<?php echo $id; ?>"/>
      </div>
  <?php	} ?>
	</div>
<?php } ?>