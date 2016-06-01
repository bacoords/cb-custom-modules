jQuery(document).ready(function(){
   jQuery(function() {
    jQuery('.cb-poise-container-<?php echo $id; ?>').magnificPopup({
     delegate: 'a',
     gallery:{enabled:true},
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false
    });
  });
});