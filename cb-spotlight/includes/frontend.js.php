jQuery(document).ready(function(){
  
  //Swap out images on link
  
  jQuery('.cb-spotlight-spn-link-<?php echo $id; ?>').click(function(){
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').fadeTo('fast','0.3');
    var i = jQuery(this).data('img-src');
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').load(function(){
    	jQuery(this).fadeTo('fast','1');
    }).attr('src',i);
  });
  

});
