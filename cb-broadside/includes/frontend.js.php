


 jQuery(document).ready(function(){
  
  //Swap out images on link
  
jQuery('.scroll-right-<?php echo $id; ?>').click(function(){
  jQuery('.ul-<?php echo $id; ?>').animate( { scrollLeft: '+=500' }, 300);
});
jQuery('.scroll-left-<?php echo $id; ?>').click(function(){
  jQuery('.ul-<?php echo $id; ?>').animate( { scrollLeft: '-=500' }, 300);
});

jQuery(function() {
	jQuery('.cb-broadside-img').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false
	});
});

});
