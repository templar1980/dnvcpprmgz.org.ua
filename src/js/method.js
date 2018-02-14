jQuery(document).ready(function($) {
    $('.method_name').click(function(event) {
        var $elem = $(this).next();
        if ($elem.is(':visible')) {

            $(this).find('i').removeClass('icon-up-open-big').addClass('icon-down-open-big');
            $elem.slideUp(450, function(){
                var height = parseInt($('.content').css('height')) + 35 + 'px';
                $('.sidebar').css({ 'min-height': height });
            });
        } else {

            $(this).find('i').removeClass('icon-down-open-big').addClass('icon-up-open-big');
            $elem.slideDown(450, function(){
                var height = parseInt($('.content').css('height')) + 35 + 'px';
                $('.sidebar').css({ 'min-height': height });
            });
        }
    });
});
