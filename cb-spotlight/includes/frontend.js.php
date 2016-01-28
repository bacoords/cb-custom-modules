jQuery(document).ready(function(){
  

  
  //Swap out images on link
  
  
  jQuery('.cb-spotlight-spn-link-<?php echo $id; ?>').click(function(){
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').css('opacity','0.3');
    var i = jQuery(this).data('img-src');
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').load(function(){
    	jQuery(this).css('opacity','1');
    }).attr('src',i);
  });
  

});
