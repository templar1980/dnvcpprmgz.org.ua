var mobile;
jQuery(document).ready(function($) {
    // hover function
    getBeginData();
    
});

$(window).resize(function(event) {
    getBeginData();
});

function afterInsert() {
    // $('.emp .emp-item').hover(function() {
    //     $(this).css({ transform: 'scale(1.03)', transition: 'all 0.15s ease-out' });
    // }, function() {
    //     $(this).css({ transform: 'none', transition: 'all 0.1s ease-out' });
    // });

    // search
    $(document).keydown(function(event) {
        var selectedTxt = window.getSelection().toString();
        var inputTxt = $('.emp-controls input').val();

        if ((event.keyCode == 8 || event.keyCode == 46)) {
            if ((inputTxt.length <= 3) || (selectedTxt.length == inputTxt.length)) {
                $('#result_search').html(' ').fadeOut(50);
                $('.emp-window').find('.emp-item').fadeIn(10);

                if ($('.emp-window:visible').find('.emp-item:visible').length == 1) {
                    $('.emp-window').find('.emp-item').fadeIn(10);
                }
            };
        }
    });

    $('.emp-controls input').focus(function(event) {
        $(this).keypress(function(event) {
            var strSearch = $(this).val();

            if (strSearch.length >= 3 && strSearch.length < 50) {
                getStrSearch(strSearch);
            }
        });
    });

    // событие по клику
    $('.emp-controls-icon i').click(function(event) {
        if ($(this).attr('class').indexOf('active') >= 0) {
            return false;
        }
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');

        var win = $(this).attr('data-id');
        var animTime = 120;

        if (win === 'w-icon') {
            $('.emp-list').fadeOut(animTime, function() {
                $('.emp').fadeIn(animTime);
            });

        } else if (win === 'w-list') {
            $('.emp').fadeOut(animTime, function() {
                $('.emp-list').fadeIn(animTime);
            });
        }

        closeWindow($('.emp-item.emp-active'));
    });

    $('.emp-item').click(function(event) {
        $('.emp-item').css({ opacity: 0.35 });
        $(this).css({ opacity: 1 });
        if ($(this).attr('class').indexOf('emp-active') >= 0) {
            closeWindow($(this));
            return false;
        };

        $active = $('.emp-active');
        $des = $('.emp-item-des');
         $des = $('.emp-item-des').remove();
        var scrollHeight = $(this).parent('.emp-row').offset().top +  $(this).parent('.emp-row').height() - 100 ;
        $('body, html').scrollTop(scrollHeight);


        $div = $('<div>').addClass('emp-item-des').html('<i class="icon-spin2 animate-spin"></i><div class="emp-des-html-cont"><i class="fa fa-cogs"></i></div>');
        var self = this;

        if ($active.length > 0) {
            $active.removeClass('emp-active');
            $des.fadeOut(250, function() {
                $des.remove();
                $div.insertAfter($(self).parent()).slideDown(200, function() {
                    getEmployersDataById($(self).attr('data-id'), $(this));
                });
                setTimeout(function() {
                    $(self).addClass('emp-active');
                }, 50);
            })
        } else {
            $(this).addClass('emp-active');
            $div.insertAfter($(this).parent()).slideDown(200, function() {
                getEmployersDataById($(self).attr('data-id'), $(this));
            });
        }

    });
}

function closeWindow(obj) {
    $(obj).removeClass('emp-active');
    $('.emp-item').css({ opacity: 1 });
    $(obj).parent().next().removeClass('chg-after').slideUp(150, function() {
        $(this).remove();
    });
}

function getEmployersDataById(id, item) {
    $.ajax({
        method: 'POST',
        url: "http://" + location.host + "/employers/read",
        data: 'id=' + id,
        cache: true,
        success: function(obj) {
            $(item).find('i.animate-spin').fadeOut(400, function() {
                $container = $(item).find('div.emp-des-html-cont');
                $container.html($container.html() + obj).css({ opacity: 1 });
                $('<div>').addClass('emp-des-footer').text('ДЦ ПТО ©2017').appendTo($(item));
                $(item).addClass('chg-after');

            });

        }
    });
}

function getBeginData() {
    var oldMobile = mobile;

    mobile = $(window).width() >= mobileSize ? 0 : 1;
    
    if (oldMobile === mobile) {
        return false;
    }

    $.ajax({
            url: "http://" + location.host + "/employers/insert",
            type: 'POST',
            dataType: 'html',
            data: { mobile: mobile },
        })
        .done(function(data) {
            $('div.employers').find('.emp.emp-window').add('.emp-list.emp-window').remove();
            $('div.employers').html($('div.employers').html() + data);
            afterInsert();
        });

}

function getStrSearch(str) {
    $.ajax({
        method: 'POST',
        url: "http://" + location.host + "/employers/strsearch",
        data: 'str=' + str,
        cache: false,
        success: function(obj) {
            var obj = JSON.parse(obj);
            var $cont = $('#result_search');
            if (obj) {
                $cont.fadeIn(50);
                $cont.html('').html(obj);
                addEvents();
            } else {
                $cont.fadeOut(50);
            }

        }
    });
}

function addEvents() {
    $('#result_search li').on('click', function(event) {
        var $items = $('.emp-window:visible').find('.emp-item');
        var id = $(this).attr('data-id');
        $items.each(function(index, el) {
            if ($(this).attr('data-id') !== id) {
                $(this).fadeOut(10);
            }
        });
        $(this).parents('#result_search').html(' ').fadeOut(50);
    });
}