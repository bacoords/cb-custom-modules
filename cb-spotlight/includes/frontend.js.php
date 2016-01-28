jQuery(document).ready(function(){
  
<!--
  
  //Preload all Images
   jQuery.preloadImages = function() {
		for (var i = 0; i < arguments.length; i++) {
			jQuery("<img />").attr("src", arguments[i]);
		}
	}
		<?php foreach($settings->cb_spotlight_form_field_repeater as $current_form){	?>

				 <a class="cb-spotlight-spn-link cb-spotlight-spn-link-<?php echo $id; ?>" data-img-src="<?php echo $current_form->cb_spotlight_photo_field_src; ?>"><?php echo $current_form->cb_spotlight_text_field; ?></a>
		<?php	} ?>
	
	jQuery.preloadImages("hoverimage1.jpg","hoverimage2.jpg");
-->
  
  //Swap out images on link
  
  
  jQuery('.cb-spotlight-spn-link-<?php echo $id; ?>').click(function(){
    var i = jQuery(this).data('img-src');
    jQuery('#cb-spotlight-spn-img-<?php echo $id; ?>').attr('style','opacity:0.3').attr('src',i).attr('style','opacity:1');
  });
  
  
  
});
