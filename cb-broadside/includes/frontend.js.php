


jQuery(document).ready(function(){
  
  //Swap out images on link
  
  jQuery('.scroll-right-<?php echo $id; ?>').click(function(){
    jQuery('.ul-<?php echo $id; ?>').animate( { scrollLeft: '+=500' }, 300);
  });
  jQuery('.scroll-left-<?php echo $id; ?>').click(function(){
    jQuery('.ul-<?php echo $id; ?>').animate( { scrollLeft: '-=500' }, 300);
  });

  jQuery(function() {
    jQuery('.ul-<?php echo $id; ?>').magnificPopup({
     delegate: a,
     gallery:{enabled:true},
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false
    });
  });

});
