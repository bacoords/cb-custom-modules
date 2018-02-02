(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    $.fn.overlaps = function(selector) {
        return this.pushStack(filterOverlaps(this, selector && $(selector)));
    };

    function filterOverlaps(collection1, collection2) {
        var dims1  = getDims(collection1),
            dims2  = !collection2 ? dims1 : getDims(collection2),
            stack  = [],
            index1 = 0,
            index2 = 0,
            length1 = dims1.length,
            length2 = !collection2 ? dims1.length : dims2.length;

        if (!collection2) { collection2 = collection1; }

        for (; index1 < length1; index1++) {
            for (index2 = 0; index2 < length2; index2++) {
                if (collection1[index1] === collection2[index2]) {
                    continue;
                } else if (checkOverlap(dims1[index1], dims2[index2])) {
                    stack.push( (length1 > length2) ?
                        collection1[index1] :
                        collection2[index2]);
                }
            }
        }

        return $.unique(stack);
    }

    function getDims(elems) {
        var dims = [], i = 0, offset, elem;

        while ((elem = elems[i++])) {
            offset = $(elem).offset();
            dims.push([
                offset.top,
                offset.left,
                elem.offsetWidth,
                elem.offsetHeight
            ]);
        }

        return dims;
    }

    function checkOverlap(dims1, dims2) {
        var x1 = dims1[1], y1 = dims1[0],
            w1 = dims1[2], h1 = dims1[3],
            x2 = dims2[1], y2 = dims2[0],
            w2 = dims2[2], h2 = dims2[3];
        return !(y2 + h2 <= y1 || y1 + h1 <= y2 || x2 + w2 <= x1 || x1 + w1 <= x2);
    }

}));

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

  if( jQuery('.tag-list') ){

    // Get all Filters
    var filters = jQuery('.tag-list--tag').map(function(){
      return jQuery(this).data('cb-df-filter');
    }).get();

    // Click on Title
    jQuery('.tag-list--title').click(function(){
      var column = jQuery(this).parent('.tag-list--column'),
      container = column.parent('.tag-list');


      column.addClass('open');

      var height = jQuery('ul', column).outerHeight();

      jQuery('.tag-list--title').not(this).parent('.tag-list--column').removeClass('open');
      if('cb-df-all' == column.data("cb-df-column")){

        jQuery('.tag-list--tag').removeClass('active');
        // showhide all the filters
        jQuery('.cb-df-filter').show("slow");
        // jQuery('.tag-list--column').css('margin-bottom', 0);
        container.css('margin-bottom', 0);

      } else{

        jQuery('.tag-list--column').not(column).css('margin-bottom', 0);
        jQuery('.tag-list--column').not(column).children('ul').css('margin-top', 0);

        container.css('margin-bottom', height);
        var conBottom = container.offset().top + container.innerHeight();
        var ulTop = jQuery('ul', column).offset().top;
        var offset = conBottom - ulTop;
        jQuery('ul', column).css('margin-top', offset );
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
