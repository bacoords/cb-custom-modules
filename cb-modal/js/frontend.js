jQuery(document).ready(function(){

  jQuery('.cb-modal-thumb').click(function(){
    jQuery(this).siblings('.cb-modal-wrapper').show();
    jQuery('body').addClass('cb-modal-no-scroll');
  });

  jQuery('.cb-modal-overlay').click(function(){
    jQuery(this).parent('.cb-modal-wrapper').hide();
    jQuery('body').removeClass('cb-modal-no-scroll');
  });

  jQuery('.cb-modal-close').click(function(){
    jQuery(this).parents('.cb-modal-wrapper').hide();
    jQuery('body').removeClass('cb-modal-no-scroll');
  });

});