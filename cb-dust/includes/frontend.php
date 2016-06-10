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
<div class="cb-dust">
   <div class="cb-dust__particles" id="cb-dust-particles"></div>
   <div class="cb-dust__editor">
     <?php if($settings->cb_dust_editor) echo $settings->cb_dust_editor; ?>
   </div>
    
</div>