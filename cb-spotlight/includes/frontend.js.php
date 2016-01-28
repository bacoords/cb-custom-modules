jQuery(document).ready(function(){
  

  
  //Swap out images on link
  
  
  jQuery('.cb-spotlight-spn-link-<?php echo $id; ?>').click(function(){
    var i = jQuery(this).data('img-src');
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').css('opacity','0.3').attr('src',i).css('opacity','1');
  });
  
  
  
});
