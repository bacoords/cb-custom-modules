jQuery(document).ready(function() {
    jQuery('.cb-caption-box-wrapper').bind('touchstart touchend', function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('hover_effect');
    });
});