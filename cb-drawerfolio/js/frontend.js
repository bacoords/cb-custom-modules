jQuery.fn.extend({
    hasClasses: function (classArray) {
        var self = this;
        for (var i in classArray) {
            if (jQuery(self).hasClass(classArray[i]))
                return true;
        }
        return false;
    },
    hasAllClasses: function (classArray) {
        var self = this;
        for (var i in classArray) {
            if (!jQuery(self).hasClass(classArray[i]))
                return false;
        }
        return true;
    }
});

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

  if( jQuery('.tag-list') ){

    // Get all Filters
    var filters = jQuery('.tag-list--tag').map(function(){
      return jQuery(this).data('cb-df-filter');
    }).get();

    // Click on Title
    jQuery('.tag-list--title').click(function(){
      var column = jQuery(this).parent('.tag-list--column')
      column.toggleClass('open');
      jQuery('.tag-list--title').not(this).parent('.tag-list--column').removeClass('open');
      if('cb-df-all' == column.data("cb-df-column")){

        jQuery('.tag-list--tag').removeClass('active');
        // showhide all the filters
        jQuery('.cb-df-filter').show("slow");
      } else{

        var filterClasses = jQuery('.tag-list--tag', column).map(function(){
          return 'cb-df-filter-' + jQuery(this).data('cb-df-filter');
        }).get();

        // showhide all the filters
        jQuery('.cb-df-filter').each(function(){
          if( jQuery(this).hasClasses(filterClasses) ){
            jQuery(this).show("slow");
          } else {
            jQuery(this).hide("slow");
          }
        });

      }

    });



    // Click on Tags
    jQuery('.tag-list--tag').click(function(){
      // Close any open drawers
      jQuery('.cb-df-filter').removeClass("show").css('margin-bottom', 0);

      // Toggle this class and otjers
      jQuery(this).toggleClass('active');
      jQuery('.tag-list--tag').not(this).removeClass('active');


      if( jQuery('.tag-list--tag').hasClass('active') ){

        // jQuery('.cb-df-filter').hide('fast');
        // jQuery('.tag-list--tag.active').each(function(){
        //   var filter = jQuery(this).data('cb-df-filter');
        //   jQuery('.cb-df-filter-'+filter).show('slow');
        // }).get();
        var filterClasses = jQuery('.tag-list--tag.active').map(function(){
          return 'cb-df-filter-' + jQuery(this).data('cb-df-filter');
        }).get();

        // showhide all the filters
        jQuery('.cb-df-filter').each(function(){
          if( jQuery(this).hasClasses(filterClasses) ){
            jQuery(this).show("slow");
          } else {
            jQuery(this).hide("slow");
          }
        });
      }
    });
  }


});
