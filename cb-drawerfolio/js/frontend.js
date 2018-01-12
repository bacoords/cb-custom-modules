jQuery(document).ready(function(){
  jQuery('.inner').click(function(){
    var inner = jQuery(this),
        container = jQuery(this).parent('li'),
        allContainers = jQuery('li').not(container),
        caption = jQuery(this).find('.caption'),
        drawer = caption.parent().next(),
        height = drawer.outerHeight();

    allContainers.removeClass("show");
    allContainers.css('margin-bottom', 0);
    container.toggleClass("show");

    if( container.hasClass("show") ){
      container.css('margin-bottom', height);
    } else {
      container.css('margin-bottom', 0);
    }
  });

  jQuery('.drawer--close').click(function(){
    var drawer = jQuery(this).parent(),
        container = drawer.parent('li');
    container.removeClass("show");
    container.css('margin-bottom', 0);
  });
});
