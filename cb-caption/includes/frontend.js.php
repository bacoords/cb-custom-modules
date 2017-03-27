$(document).ready(function() {
    $('.cb-caption-box-wrapper').bind('touchstart touchend', function(e) {
        e.preventDefault();
        $(this).toggleClass('hover_effect');
    });
});