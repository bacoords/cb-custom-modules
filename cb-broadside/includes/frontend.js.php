jQuery(document).ready(function(){
  
  //Swap out images on link

  
  var maxScrollLeft = jQuery('.ul-<?php echo $id; ?>')[0].scrollWidth - jQuery('.ul-<?php echo $id; ?>')[0].clientWidth;
  
  if(jQuery('.ul-<?php echo $id; ?>').scrollLeft() < maxScrollLeft){
    jQuery('.scroll-right-<?php echo $id; ?>').removeClass('scroll-right--hidden');
  } 
  
  
  jQuery('.scroll-right-<?php echo $id; ?>').click(function(){
    jQuery('.ul-<?php echo $id; ?>').animate( { scrollLeft: '+=300' }, 300, 'swing');
  });
  jQuery('.scroll-left-<?php echo $id; ?>').click(function(){
    jQuery('.ul-<?php echo $id; ?>').animate( { scrollLeft: '-=300' }, 300, 'swing');
  });
  
  
  jQuery('.ul-<?php echo $id; ?>').scroll(function(){
    if(jQuery('.ul-<?php echo $id; ?>').scrollLeft() <= 0){
      jQuery('.scroll-left-<?php echo $id; ?>').addClass('scroll-left--hidden');
    } else {
      jQuery('.scroll-left-<?php echo $id; ?>').removeClass('scroll-left--hidden');
    }
    
    if(jQuery('.ul-<?php echo $id; ?>').scrollLeft() >= maxScrollLeft){
      jQuery('.scroll-right-<?php echo $id; ?>').addClass('scroll-right--hidden');
    } else {
      jQuery('.scroll-right-<?php echo $id; ?>').removeClass('scroll-right--hidden');
    }
    
  });
  
  jQuery(function() {
    jQuery('.ul-<?php echo $id; ?>').magnificPopup({
     delegate: 'a',
     gallery:{enabled:true},
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false
    });
  });

});