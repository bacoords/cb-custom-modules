/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example:  
 */
 

jQuery(document).ready(function(){
  jQuery(document).scroll(function(){
    
    var scrollTop     = jQuery(window).scrollTop(),
        elementOffsetTop = jQuery('.fl-node-<?php echo $id; ?> .cb-scout-placeholder').offset().top,
        elementOffsetLeft = jQuery('.fl-node-<?php echo $id; ?> .cb-scout-placeholder').offset().left,
        distance      = (elementOffsetTop - scrollTop),
        width = jQuery('.fl-node-<?php echo $id; ?> .cb-scout-placeholder').width();
    
    
    console.log(distance);
    if(distance < 0){
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout').addClass('cb-scout-sticky');
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout').css('width',width);
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').css('left',elementOffsetLeft);
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').css('position','relative');
    } else {
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout').removeClass('cb-scout-sticky');
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout').removeAttr('style');
      jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').removeAttr('style');
    }
  });
});
