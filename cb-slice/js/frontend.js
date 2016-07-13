jQuery(document).ready(function(){
  if(jQuery(".cb-slice-img-wrapper").length > 1){
    cb_slice_custom_gallery();
  }
});

jQuery(window).resize(function(){
  if(jQuery(".cb-slice-img-wrapper").length > 1){
    cb_slice_custom_gallery();
  }
});

  
jQuery(function() {
  jQuery('.cb-slice').magnificPopup({
   delegate: 'a',
   gallery:{enabled:true},
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false
  });
});

function cb_slice_custom_gallery(){
	if( jQuery( window ).width() < 1100){
		jQuery(".cb-slice-img-wrapper").removeAttr( 'style' );
		jQuery(".cb-slice-caption").removeAttr( 'style' );
		jQuery(".cb-slice-img-wrapper").unbind( 'mouseenter' );
		jQuery(".cb-slice-img-wrapper").unbind( 'mouseleave' );
		// jQuery(".cb-slice-img-wrapper").each(function(){




		// });
	} else if( jQuery( ".cb-slice-row-case" ).width() >= 1100){
		jQuery(".cb-slice-row-case").each(function(){
			//jQuery(this).children('.cb-slice-img-wrapper').css('width','500px');
			// Count Images
			var totalimgs = jQuery(this).children('.cb-slice-img-wrapper').length;
			//var totalimgs = 9;
			// Determing Available Width
			var totalwidth = jQuery( ".cb-slice-row-case" ).innerWidth();
            totalwidth -= 3;
			// Delete white border amount
			var maxwidth = totalwidth;
			//determine static width
			var galsstaticwidth = totalwidth / totalimgs;
			// Determine size for hovered img
	        // var maxpicwidth = jQuery( window ).width() - (jQuery( window ).width() * .25); //reasonable size for picture
	        // if (maxpicwidth < 600) { 
	        //   var galshoveredwidth = maxpicwidth; 
	        // }else{ 
	        //   var galshoveredwidth = 600; 
	        // };
	        var galshoveredwidth = 600; 
	        // Determine size for skinny images
	        var galsskinnywidth = (maxwidth - galshoveredwidth) / (totalimgs - 1);
	        var moveleft = ((galshoveredwidth - galsstaticwidth) / 2) * -1;
	       
	       // change all widths to static width
	        jQuery(this).children('.cb-slice-img-wrapper').css('width',galsstaticwidth);
	       	// jQuery(this).children('.cb-slice-img-wrapper > .cb-slice-img').css('width',galshoveredwidth);

	       	// jQuery(this).children('.cb-slice-img-wrapper > .cb-slice-img').css('right',moveleft);




		    jQuery(this).children('.cb-slice-img-wrapper').mouseenter(function(){

		      jQuery(this).siblings().css('width',galsskinnywidth);   
		      jQuery(this).width(galshoveredwidth);
		      jQuery(this).children(".cb-slice-img").children(".cb-slice-caption").css("transform","translateY(-50px)");

		    });
		    jQuery(this).children('.cb-slice-img-wrapper').mouseleave(function(){
			  jQuery(this).css('width',galsstaticwidth);
		      jQuery(this).siblings().css('width',galsstaticwidth);

		      jQuery(this).children(".cb-slice-img").children(".cb-slice-caption").delay(5000).css("transform","translateY(50px)");
		    }); 

		});
	}
}