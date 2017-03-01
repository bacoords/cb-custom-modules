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

<?php if(isset($settings->cb_modal_photo_src)){ ?> 
  
  <div class="cb-modal">

    <div class="cb-modal-thumb">

      <img src="<?php echo $settings->cb_modal_photo_src; ?>" alt="thumbnail">

    </div>

    <div class="cb-modal-wrapper">

      <div class="cb-modal-overlay">

      </div>

      <div class="cb-modal-box">

        <div class="cb-modal-box__thumb">

          <img src="<?php echo $settings->cb_modal_photo_src; ?>" alt="thumbnail"> 

        </div>

        <div class="cb-modal-box__description">

          <?php echo $settings->cb_modal_content; ?>

        </div>
      
        <div class="cb-modal-close">

          <span>&#215;</span>

        </div>

      </div>

    </div>
	
	</div>
	
<?php } ?>