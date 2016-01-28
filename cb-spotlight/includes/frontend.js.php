jQuery(document).ready(function(){
  jQuery('.cb-spotlight-spn-link-<?php echo $id; ?>').click(function(){
    var i = jQuery(this).data('img-src');
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').attr('src',i);
  });
