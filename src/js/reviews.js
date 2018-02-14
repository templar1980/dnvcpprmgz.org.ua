var totalReviews = {
    reviewsOnPage: 0,
    totalReviewsInBase: 0
};
var reviewsOnPage = 6;


jQuery(document).ready(function($) {
    fillForm();
    subscribeEvents();
    getReviewsFromServer({
        quantityPerPage: reviewsOnPage
    });
});

function clickForm() {
    $('#err-win').removeClass('win-opened win-sended');
}

function logoPosition() {
    var toTop = $('.reviews-form-body').get(0).offsetTop - 15;
    $('.form-logo').css({ top: toTop + 'px' });
}

function collectDateFromForm() {
    var form = $(form);
    var formData = { err: '' };
    formData.firstName = $('#first_name').val();
    formData.lastName = $('#last_name').val();
    formData.email = $('#email').val();

    var checkbox = $('#not-education').get(0);
    var month = $('#end-date-month').val();
    var year = $('#end-date-year').val();
    if (!checkbox.checked && (!month || !year)) {
        formData.err += '* Вкажіть дату закінчення навчання в нашому центрі<br>';
    };

    if (checkbox.checked) {
        formData.endDate = 0;
    } else {
        month = month < 10 ? '0' + month : month;
        formData.endDate = year + '-' + month;
        formData.profession = $('#form_profession').val();
    };

    if (!checkbox.checked && !formData.profession) {
        formData.err += '* Вкажіть професію за якою навчалися в нашому центрі<br>';
    };


    formData.company = $('#form_company').val();
    formData.position = $('#form_position').val();
    formData.review = $('#review').val();
    formData.proposition = $('#proposition').val();
    formData.rating = $('i.selected-star').length;

    if (!formData.rating > 0) {
        formData.err += '* Виставте оцінку<br>';
    };

    if (!formData.review && !formData.proposition) {
        formData.err += '* Напишіть відгук або пропозицію<br>';
    };

    return formData;
}

function saveDataFromForm(str) {
    $.ajax({
        method: 'POST',
        url: "http://" + location.host + "/reviews/save",
        data: 'data=' + str,
        cache: true,
        success: function(obj) {
            var txt = '<i class="fa fa-check-circle"></i> Дякуємо за ваш відгук!<br> Після перегляду адміністратором він буде опублікований...'

            if (!+obj) {
                txt = '<i class="fa fa-exclamation-circle"></i> Виникла помилка, спробуйте пізніше...';
                $('#err-win').removeClass('win-sended').addClass('request').find('div').html(txt);
                $('form').on('click', clickForm);
                return false;
            };

            $('#err-win').removeClass('win-sended').addClass('request').find('div').html(txt);
            setTimeout(function() {
                $('form').get(0).reset();
                $('#err-win').removeClass('win-opened win-sended request');
                $('form').on('click', clickForm);
                $('.reviews-form').hide();
            }, 5000);
        },
        error: function() {
            var txt = '<i class="fa fa-ban"></i> Виникла помилка зєднання...'
            $('#err-win').removeClass('win-sended').addClass('request').find('div').html(txt);
        }
    });
}

function fillForm() {
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth();
    var html = '';
    var arrMonth = [
        'Січень',
        'Лютий',
        'Березень',
        'Квітень',
        'Травень',
        'Червень',
        'Липень',
        'Серпень',
        'Вересень',
        'Жовтень',
        'Листопад',
        'Грудень'
    ];
    for (var i = 0; i < arrMonth.length; i++) {
        html += '<option value="' + (i + 1) + '"">' + arrMonth[i] + '</option>';
    }
    html += '<option value="" selected></option>';
    $('#end-date-month').html(html);

    html = '';
    for (var i = 1970; i <= year; i++) {
        html += '<option value="' + i + '">' + i + '</option>';
    }
    html += '<option value="" selected></option>';
    $('#end-date-year').html(html);
}

function subscribeEvents() {
    /*EVENTS START*/
    $(window).resize(function(event) {
        logoPosition();
    });

    $('.form-row').find('input, select, textarea').focusin(function(event) {
        $(this).parent().addClass('focused');
    });
    $('.form-row').find('input, select, textarea').focusout(function(event) {
        $(this).parent().removeClass('focused');
    });
    $('#not-education').change(function(event) {
        if (this.checked) {
           disableElementOnForm();
        } else {
           enableElementOnForm();
        }
    });

    var stars = $('.form-rating').find('i');
    $('.form-rating').find('i').hover(function() {
        var starIndex = $(this).index();
        $(stars).each(function(index, el) {
            var elClass = $(el).attr('class');
            if (index <= starIndex) {
                $(el).removeClass('fa-star-o').addClass('fa-star');
            } else {
                if (elClass.indexOf('selected-star') >= 0) {
                    return false;
                }
                $(el).removeClass('fa-star').addClass('fa-star-o');
            };
        });
    }, function() {});

    $('.form-rating').hover(function() {}, function() {
        $(this).find('i').not('.selected-star').removeClass('fa-star').addClass('fa-star-o');
    });

    $('.form-rating').find('i').click(function(event) {
        var starIndex = $(this).index();
        $(stars).removeClass('selected-star').removeClass('fa-star').addClass('fa-star-o');
        for (var i = 0; i <= starIndex; i++) {
            $(stars).eq(i).addClass('selected-star fa-star').removeClass('fa-star-o');
        };
        $(this).parent().find('.rating-txt').text(starIndex + 1);
    });

    $('#form-open').click(function(event) {
        var checkbox =  $('#not-education').get(0);
        if (!checkbox.checked) {
           enableElementOnForm();      
        };
        $('.reviews-form').css({ display: 'flex' });
        logoPosition();
        setTimeout(function() {
            $('.reviews-form').css({ opacity: 1 });
        }, 10)
    });

    $('#form-close').click(function(event) {
        $('.reviews-form').css({ opacity: 0 });
        setTimeout(function() {
            $('.reviews-form').css({ display: 'none' });
        }, 400)
    });

    $('form').on('reset', function(event) {
        $('.form-rating').find('i').removeClass('selected-star fa-star').addClass('fa-star-o');
        $('.form-rating').find('span.rating-txt').text('0');
    });

    $('form').submit(function(event) {
        event.preventDefault();
        var formData = collectDateFromForm();
        if (formData.err) {
            var html = '<i class="fa fa-exclamation-triangle"></i>' + (formData.err).slice(0, -4);
            $('#err-win').addClass('win-opened').find('div').html(html);
            return false;
        };

        $('#err-win').addClass('win-opened win-sended').find('div').html('');
        var form = $('form').off('click').get(0);
        form.reset();
        var arrFormData = [];
        arrFormData.push(formData);
        arrFormData = JSON.stringify(arrFormData);
        saveDataFromForm(arrFormData);
    });

    $('form').on('click', clickForm);


    /*EVENTS END*/
}

function getReviewsFromServer(options) {
    var options = options || {};
    options.quantityPerPage = options.quantityPerPage || 5;
    options.startPos = options.startPos || 0;
    $.ajax({
        method: 'POST',
        url: "http://" + location.host + "/reviews/read",
        data: 'startPos=' + options.startPos + '&qtPerPage=' + options.quantityPerPage,
        cache: false,
        success: function(obj) {
            var obj = JSON.parse(obj);
            var arrReviews = obj[0];
            totalReviews.totalReviewsInBase = +obj[1];

            $('.reviews-block .preloader').fadeOut(250, function() {

                if (!totalReviews.totalReviewsInBase) {
                    $('<p>').html('Поки що, відгуків не знайдено. <br> Ви маєте можливість стати першим, хто розпочне цю сторінку...').appendTo($('.reviews-block'));
                } else {
                    $(arrReviews).each(function(index, obj) {
                        createHtmlMarkup(obj);
                    });
                    totalReviews.reviewsOnPage = $('.reviews-item').length;
                };

                $('button.more').remove();
                if (totalReviews.totalReviewsInBase > totalReviews.reviewsOnPage && totalReviews.totalReviewsInBase) {
                    createControlButton();
                };
            });
        },
        error: function() {

        }
    });
}

function createHtmlMarkup(obj) {

    var date = (obj.create_date).split('-');
    var endDate,
        profession = obj.end_date ? obj.profession : '',
        workPosition = (obj.company || obj.position) ? obj.company + ' ' + obj.position : 'не вказав';
    date = date[2] + '.' + date[1] + '.' + date[0];
    var arrMonth = [
        'Січень',
        'Лютий',
        'Березень',
        'Квітень',
        'Травень',
        'Червень',
        'Липень',
        'Серпень',
        'Вересень',
        'Жовтень',
        'Листопад',
        'Грудень'
    ];
    var $review = $('<div>', { class: 'reviews-item' });
    var $header = $('<div>', { class: 'item-header' }).appendTo($review);
    var $container = $('<div>', {
        class: 'item-header-icon',
        html: '<img src="/img/all/user_ananymous.png" alt="Коручтувач сайту ДЦПТО">'
    }).appendTo($header);
    $('<div>', { class: 'date' }).text(date).appendTo($container);

    $container = $('<div>', { class: 'item-header-name' }).appendTo($header);
    $('<div>', { class: 'user-fio' }).text(obj.first_name + ' ' + obj.last_name).appendTo($container);
    if (!obj.end_date) {
        endDate = 'не навчався в нашому закладі';
    } else {
        endDate = (obj.end_date).split('-');
        endDate = arrMonth[+endDate[1] - 1] + ' ' + endDate[0];
    }
    $('<div>', { class: 'end-date' }).html('<strong>Дата закінчення: </strong>' + endDate).appendTo($container);

    $('<div>', { class: 'profession' }).html('<strong>Закінчив за професією: </strong>' + profession).appendTo($container);

    var style = workPosition === 'не вказав' ? 'style="opacity:0.5"' : '';
    $('<div>', { class: 'profession' }).html('<strong>Працює в: </strong> <span ' + style + '>' + workPosition + '</span>').appendTo($container) ;

    var $elem = $('<div>', { class: 'rating' }).appendTo($container);
    for (var i = 0; i < 5; i++) {
        var starClass = i < obj.rating ? 'fa-star' : 'fa-star-o';
        $('<i>', { class: 'fa ' + starClass }).appendTo($elem);
    }
    $('<span>').text(obj.rating + ' із 5').appendTo($elem);
    $('<i>', { class: 'fa fa-quote-left' }).appendTo($header);


    $container = $('<div>', { class: 'reviews-item-block' }).appendTo($review);
    if (obj.reviews_txt) {
        insertReviewsBlocks('reviews-block-user-txt', obj.reviews_txt).appendTo($container);
    };
    if (obj.reviews_answer) {
        insertReviewsBlocks('reviews-block-admin-txt', obj.reviews_answer, true).appendTo($container);
    }


    $container = $('<div>', { class: 'proposition-block' }).appendTo($review);
    if (obj.proposition_txt) {
        insertReviewsBlocks('reviews-block-user-txt', obj.proposition_txt, false, true).appendTo($container);
    };
    if (obj.proposition_answer) {
        insertReviewsBlocks('reviews-block-admin-txt', obj.proposition_answer, true).appendTo($container);
    }

    $('.preloader').before($review.fadeIn(250));
}

function insertReviewsBlocks(wrapperClass, text, isAdmin, isProposition) {
    var $elem = $('<div>', { class: wrapperClass });
    var $p = $('<p>', { class: 'reviews-txt' }).html(text).appendTo($elem);

    if (isProposition) {
        $p.html('');
        $('<p>', { class: 'reviews-block-name', text: 'Пропозиція' }).appendTo($p);
        $('<span>').text(text).appendTo($p);
    };

    if (isAdmin) {
        $p.html('');
        $('<span>', { class: 'reviews-block-name', text: 'Адміністрація' }).appendTo($p);
        $('<span>').text(text).appendTo($p);
    };
    return $elem;
}

function createControlButton() {
    $button = $('<button>', { class: 'more' }).html('<i class="fa fa-undo"></i>Більше...').appendTo($('.reviews'));
    $button.click(function(event) {
        $('.preloader').show(30);
        getReviewsFromServer({
            quantityPerPage: reviewsOnPage,
            startPos: totalReviews.reviewsOnPage
        });
    });
}

function disableElementOnForm() {
    $('select[name="end_date"]').attr('disabled', '');
    $('#label_check').css({ opacity: 0.3 });
    $('#form_profession').attr('disabled', '');
    $('label[for="form_profession"]').css({ opacity: 0.3 });
};

function enableElementOnForm() {
    $('select[name="end_date"]').removeAttr('disabled');
    $('#label_check').css({ opacity: 1 });
    $('#form_profession').removeAttr('disabled');
    $('label[for="form_profession"]').css({ opacity: 1 });
};
