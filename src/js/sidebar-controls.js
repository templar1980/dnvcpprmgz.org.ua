var status = true;
$(document).ready(function() {
    setAnimationForLinkMainMenu();

    var timeSlide = 500,
        classOpen = 'icon-up-open-big',
        classClose = 'icon-down-open-big',
        // idYoutubeChannel = 'UCm8p2XTbLVcMAfM_QCJ2A6Q';

        timeSlide = $(window).width() >= 600 ? timeSlide : 200;

    // idYoutubeChannel = 'UChfBa9zN-jJK_A5G8K5HLkw';
    activateBtnToTop($('.btn-toTop'));
    activateCallbackBtn();

    //get id for uploads with youtube channel and link for last video in uploads
    // $.ajax({
    //     url: "https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=" + idYoutubeChannel + "&key=AIzaSyDUmOL4KdDgEQewmIewR_l4peBOkKqkCig",
    //     success: function(obj) {
    //         var idUploads = obj.items[0].contentDetails.relatedPlaylists.uploads;
    //         $.ajax({
    //             url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=1&playlistId=" + idUploads + "&key=AIzaSyDUmOL4KdDgEQewmIewR_l4peBOkKqkCig",
    //             success: function(obj) {
    //                 var videoId = 'https://www.youtube.com/embed/' + obj.items[0].snippet.resourceId.videoId;
    //                 $('#last-youtube-video').attr('src', videoId);
    //             }
    //         });
    //     }
    // });

    $('.sidebar-menu-1>li>span').click(function(event) {

        var $elem = $(this).parent().find('.sidebar-menu-2');

        if ($(window).width() <= mobileSize) {
            if ($elem.is(':visible')) {
                $(this).removeClass('visible').addClass('hidden');
                $elem.slideUp(timeSlide);
                $(this).find('i').eq(1).removeClass(classOpen).addClass(classClose);
                return false;
            } else {
                $(this).removeClass('hidden').addClass('visible');
                $elem.slideDown(timeSlide);
                $(this).find('i').eq(1).removeClass(classClose).addClass(classOpen);
                return false;
            };
        }
        $('.sidebar-menu-1>li>span').removeClass('visible');
        $(this).addClass('visible');
        if (!$elem.is(':visible')) {
            $('.sidebar-menu-1>li>span>i+i').removeClass(classOpen).addClass(classClose);
            $(this).find('i').eq(1).removeClass(classClose).addClass(classOpen);
            $('.sidebar-menu-1>li').find('.sidebar-menu-2').slideUp(timeSlide);
            $elem.slideDown(timeSlide);
        };
    });

    var $itemMenu = $('.selected>a');
    var url = new DataURL();
    $itemMenu.each(function(index, el) {
        var href = $(this).attr('href');
        if (
            (href === '/' + url.page) || (href === '/' + url.page + '/' + url.method) ||
            ((href.indexOf(url.strParametrs[0]) > -1) & url.strParametrs[0] !== '')
        ) {
            var $parentLi = $(this).parent().addClass('active').parents('li');
            $parentLi.find('span').addClass('visible');
            $parentLi.find('.sidebar-menu-2').css({ display: 'block' });
        }
    });

    getInterviewData();

    $('#mbtn-sidebar-open').click(function(event) {
        if ($('.sidebar').attr('class').indexOf('m-show') > -1) {
            $('.sidebar').removeClass('m-show');
            $(this).removeClass('opened');
            // $('.main').css({position:'static'});
            return false;
        };
        $('.sidebar').addClass('m-show');
        $(this).addClass('opened');
        // $('.main').css({position:'fixed'});
    });

    $('#mbtn-sidebar-close').click(function(event) {
        $('.sidebar').removeClass('m-show');
        $('#mbtn-sidebar-open').removeClass('opened');
        // $('.main').css({position:'static'});
    });
});


function setAnimationForLinkMainMenu() {
    $('a[href^="/#"]:not(a[href$="#"])').click(function(event) {
        // event.preventDefault();
        var link = $(this).attr('href').substr(1);
        var scroll = $(link).offset().top;
        $('html, body').animate({ scrollTop: scroll }, 400);
    });
}


function getStrTime(time) {
    //Функция возвращает время в формате '00'
    if (time > 0) {
        return (time >= 10) ? time : '0' + time;
    } else {
        return '00';
    }
}

function popupErrWin() {
    var elem = $('#form-interview div.buttons-row');
    setTimeout(function() {
        $(elem).find('.interview-errors').css({ transform: 'scale(1)' });
        $('#send-interview').attr('disabled', '');
    }, 30);
    setTimeout(function() {
        $(elem).find('.interview-errors').remove();
        $('#send-interview').removeAttr('disabled');
    }, 2000);
}

function getInterviewData() {

    $('#form-interview').submit(function(event) {
        event.preventDefault();
        return false;
    });
    checkInterview(0.1);

    $('#send-interview').click(function(event) {
        event.preventDefault();

        var id;

        $('div.interview input[type="radio"]').each(function(index, el) {
            if ($(this).is(':checked')) {
                id = $(this).val();
            }
        });
        if (id === undefined) {
            var $div = $('<div>', { class: 'interview-errors'}).html('<i class="fa fa-warning"></i>Виберіть відповідь...');
            $('#form-interview div.buttons-row').prepend($div);
            popupErrWin();
            return false;
        }

        $.ajax({
                url: '/interview/save',
                type: 'POST',
                data: { id: id },
            })
            .done(function(respond) {
                respond = JSON.parse(respond);

                if (respond.err) {
                    $('#form-interview div.buttons-row').prepend(respond.html);
                    popupErrWin();
                    return false;
                }

                $('div.answer-interview-wrapper').html(respond.html);
                $('#stat-interview').click();
            });
    });

    $('#stat-interview').click(function(event) {
        event.preventDefault();
        $('div.interview').fadeOut(200, function() {
            $('div.answer-interview').fadeIn(50, animateInterviewLine);
        });
    });

    $('#int-interview').on('click', function(event) {
        event.preventDefault();
        $('div.answer-interview').fadeOut(200, function() {
            $('.answer-line').css('width', '0');
            $('div.interview').fadeIn(50);
        });
    });
}


/*
        ANIMATE interview
*/

$(window).scroll(function(event) {
    checkInterview();
});

$(window).resize(function(event) {
    checkInterview(0.5);
});

function animateInterviewLine() {
    $elemnts = $('.answer-line');
    $elemnts.each(function(index, el) {
        $(this).css({
            width: $(this).attr('data-width') + 'px',
            'transition-duration': $(this).attr('data-width') / 100 / 3 + 's'
        });
    });
}

function onScreen(element, tolerance) {
    var tolerance = tolerance || 0.85;
    tolerance = tolerance > 1 ? 1 : tolerance;
    var topScreen = $(window).scrollTop();
    var bottomScreen = $(window).height() + topScreen;
    var topElement = $(element).offset().top;
    var delta = $(element).height() * tolerance >= $(window).height() ? $(window).height() : $(element).height() * tolerance;
    var bottomElement = topElement + delta;

    if (topElement >= topScreen && bottomElement <= bottomScreen) {
        return true;
    } else {
        return false;
    }
}

function checkInterview(tolerance) {
    var tolerance = tolerance || 0.85;
    if (
        ($('.answer-interview').is(':visible') &&
            onScreen($('.answer-interview'), tolerance)) ||
        $(window).width() <= mobileSize
    ) {
        animateInterviewLine();
    };
}