var viewer;
jQuery(document).ready(function($) {
    getDataForSlider();
    // activateBtnToTop($('.btn-toTop'));

    $('.hello img').click(function(event) {
        viewer = new ImgViewer($('.hello'), $(this).index('.hello img'));
        viewer.init();
    });

    $('.sidebar').css({ 'margin-top': '-35px' });

    setInterval(function() {
        if ($('.collage_main_student').attr('class') == 'collage_main_student col_stud_show') {
            $('.collage_main_student').removeClass('col_stud_show').addClass('col_stud_hide');
        } else {
            $('.collage_main_student').removeClass('col_stud_hide').addClass('col_stud_show');
        }

        if ($('.collage_main_corpus').attr('class') == 'collage_main_corpus col_corp_show') {
            $('.collage_main_corpus').removeClass('col_corp_show').addClass('col_corp_hide');
        } else {
            $('.collage_main_corpus').removeClass('col_corp_hide').addClass('col_corp_show');
        }
    }, 10000);




    $('.advert-header').click(function(event) {
        event.preventDefault();
        $header = $(this);

        $elem = $(this).next('div.advert-text');
        if ($elem.is(':visible')) {
            $elem.slideUp(400, function() {
                $header.children('i').removeClass('icon-up-open-big').addClass('icon-down-open-big');
                var height = parseInt($('.content').css('height')) + 35 + 'px';
                $('.sidebar').css({ 'min-height': height });
            });

        } else {
            $elem.slideDown(400, function() {
                $header.children('i').removeClass('icon-down-open-big').addClass('icon-up-open-big');
                var height = parseInt($('.content').css('height')) + 35 + 'px';
                $('.sidebar').css({ 'min-height': height });
            });

        }
    });
});
$(window).on('load', windowLoaded);


function windowLoaded() {
    $('#body-preloader').fadeOut(200, function() {
        $('#body-preloader').remove();
        $('body').removeAttr('style');
    });
    // var delayTime = $(window).width() <= mobileSize ? 0 : 400;
    setTimeout(function() {
        $('.name em').each(function(index) {
            var cssRule = {
                opacity: 1,
                transform: 'rotateY(0)',
                'transition-delay': index * 0.06 + 's'
            };
            $(this).css(cssRule);
        });
    }, 10);
}