jQuery(document).ready(function(){

	 jQuery('.cb-nested-gallery-container').bxSlider({
     onSliderLoad: function(){
       checkHeights();
     }
   });

	 jQuery('.cb-nested-gallery--gallery').magnificPopup({
		delegate: 'a',
		gallery:{enabled:true},
		 type: 'image',
		 closeOnContentClick: true,
		 closeBtnInside: false
	 });
    checkHeights();
	 jQuery('.cb-nested-gallery--toggle').click(function(){
		 var th = jQuery(this);
		 var sub = th.data('toggle');
		 jQuery(sub).toggle();
     checkHeights();

	 });


   function checkHeights(){
     jQuery('.cb-nested-gallery--item').each(function(){
        var th = jQuery(this);
        var ht = th.outerHeight();
        th.find('.cb-nested-gallery--sub').css('min-height', ht);
     });
   }

});
