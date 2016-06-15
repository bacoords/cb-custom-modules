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
  <div class="cb-scout--placeholder"></div>
  <div class="cb-scout">
     
     <?php if(($settings->cb_scout_responsive == 'icon')){
        echo '<div class="cb-scout--mobile-icon"><i class="fa fa-bars" aria-hidden="true"></i></div>';
      }
      ?>
      <ul <?php if(($settings->cb_scout_responsive == 'icon')){
        echo 'class="cb-scout--mobile-hide"';
      }
      ?>>
          <?php
              $f = true;
              $i = 0;
              foreach($settings->cb_scout_form_field_repeater as $current_form){	?>
							 <li class="cb-scout__li-<?php echo $id; ?>">
							 		<a href="<?php echo $current_form->cb_scout_link_url; ?>" <?php if(($settings->cb_scout_first_active == 'true') && ($i < 1)){ echo 'class="cb-scout--active"'; }
                ?>>
							 		  <?php echo $current_form->cb_scout_link_text; ?>
							 		</a>
							 	</li>
					    <?php	
               $i++;
               } ?>
      </ul>   
  </div>
  



<?php	} ?>