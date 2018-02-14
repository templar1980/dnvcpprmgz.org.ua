function ListNews(qtNewsPerPage) {
    var url = new DataURL();
    if (!url.method) {
        var extraOptions = {
            active: $('.pagination-link-active').text() || 1,
            quantity: qtNewsPerPage,

        }
    };
    this.addEventForPaginationNav = function() {
        var self = this;
        $('.pagenation-nav-btn-pages').click(function() {
            var activeIndex = parseInt($(this).text());
            if (parseInt($(this).text()) == parseInt($('.pagenation-link-active').text())) {
                return false;
            }
            extraOptions.active = parseInt($(this).text());
            self.getListNewsFromServer(url.getStrDataWithExtra(extraOptions));
            scrollClickPagenationNav();
        });
        $('.pagenation-nav-btn-next').click(function() {
            if (!(extraOptions.active + 1 > $('.pagenation-nav-btn-pages').length)) {
                extraOptions.active += 1;
                self.getListNewsFromServer(url.getStrDataWithExtra(extraOptions));
            };
            // scrollClickPagenationNav();
        });
        $('.pagenation-nav-btn-prev').click(function() {
            if (extraOptions.active - 1 > 0) {
                extraOptions.active -= 1;
                self.getListNewsFromServer(url.getStrDataWithExtra(extraOptions));
            };
            // scrollClickPagenationNav();
        });
    };

    function scrollClickPagenationNav() {
        var scroll = $('.content').offset().top - 100;
        if ($(window).scrollTop() > scroll) {
            $('body, html').animate({ scrollTop: scroll }, 200);
        };
    };


    this.getListNewsFromServer = function() {
        var self = this;
        if (!url.method) {
            $.ajax({
                method: 'POST',
                url: "http://" + location.host + "/news/list",
                data: url.getStrDataWithExtra(extraOptions),
                cache: false,
                dataType: 'html',
                success: function(obj) {
                    $('.content').html(obj);
                    self.addEventForPaginationNav();
                }
            });
        };
    }


    return this;
};

function ListOldNews(qtNewsPerPage) {
    var url = new DataURL();
    if (!url.method) {
        var extraOptions = {
            active: $('.pagination-link-active').text() || 1,
            quantity: qtNewsPerPage,
            year: $('.oldnews_year_active').text(),
            sortDown: 0

        }
    };
    var self = this;

    $('.year_panel li').click(function(event) {
        if ($(this).attr('class') == 'oldnews_year_active') {
            return false;
        }
        $('.year_panel li').removeClass('oldnews_year_active');
        $(this).addClass('oldnews_year_active');
        extraOptions.year = $(this).text();
        extraOptions.active = 1;

        // запись в cookie
        $.cookie('oldnews', JSON.stringify(extraOptions));

        self.getListOldNewsFromServer(url.getStrDataWithExtra(extraOptions));
    });

    $('.sort_panel select').change(function(event) {
        extraOptions.sortDown = $(this).val();
        extraOptions.active = 1;

        // запись в cookie
        $.cookie('oldnews', JSON.stringify(extraOptions));

        self.getListOldNewsFromServer(url.getStrDataWithExtra(extraOptions));
    });
    this.addEventForPaginationNav = function() {
        var self = this;
        $('.pagenation-nav-btn-pages').click(function() {
            var activeIndex = parseInt($(this).text());
            if (parseInt($(this).text()) == parseInt($('.pagenation-link-active').text())) {
                return false;
            }
            extraOptions.active = parseInt($(this).text());

            // запись в cookie
            $.cookie('oldnews', JSON.stringify(extraOptions));

            self.getListOldNewsFromServer(url.getStrDataWithExtra(extraOptions));
            // scrollClickPagenationNav();
        });
        $('.pagenation-nav-btn-next').click(function() {
            if (!(extraOptions.active + 1 > $('.pagenation-nav-btn-pages').length)) {
                extraOptions.active += 1;

                // запись в cookie
                $.cookie('oldnews', JSON.stringify(extraOptions));

                self.getListOldNewsFromServer(url.getStrDataWithExtra(extraOptions));
            };
            // scrollClickPagenationNav();
        });
        $('.pagenation-nav-btn-prev').click(function() {
            if (extraOptions.active - 1 > 0) {
                extraOptions.active -= 1;

                // запись в cookie
                $.cookie('oldnews', JSON.stringify(extraOptions));

                self.getListOldNewsFromServer(url.getStrDataWithExtra(extraOptions));
            };
            // scrollClickPagenationNav();
        });
    };

    function scrollClickPagenationNav() {
        var scroll = $('.content').offset().top - 100;
        if ($(window).scrollTop() > scroll) {
            $('body, html').animate({ scrollTop: scroll }, 200);
        };
    };

    this.getListOldNewsFromServer = function() {
        var self = this;

        // установка настроек согласно cookie
        if (!!$.cookie('oldnews')) {
            extraOptions = JSON.parse($.cookie('oldnews'));
            $('.year_panel li').removeClass('oldnews_year_active');
            $('.year_panel li').each(function(index, el) {
                if ($(this).text() == extraOptions.year) {
                    $(this).addClass('oldnews_year_active');
                }
            });
            $('.sort_panel select option').each(function(index, el) {
                if ($(this).val() == extraOptions.sortDown) {
                    $(this).attr('selected', 'true');
                }
            });
        };

        // запрос списка новостей        
        if (!url.method) {
            $.ajax({
                method: 'POST',
                url: "http://" + location.host + "/oldnews/list",
                data: url.getStrDataWithExtra(extraOptions),
                cache: false,
                dataType: 'html',
                success: function(obj) {
                    $('.oldnews_list').html(obj);
                    self.addEventForPaginationNav();
                }
            });
        };
    }
    return this;
};

function activateBtnToTop(btnToTop) {
    $(btnToTop).css({ right: $('.main').offset().left + 20 + 'px' });
    if ($(window).scrollTop() > 200) {
        $(btnToTop).css({ display: 'block' });
    };
    $(window).scroll(function(event) {
        if ($(window).scrollTop() > 200) {
            $(btnToTop).fadeIn(400);
        } else {
            $(btnToTop).fadeOut(400);
        };
    });
    $(btnToTop).click(function() {
        $('html, body').animate({ scrollTop: 0 }, 500);
    });
};

function activateCallbackBtn() {
    $('#callback').click(function(event) {
        event.preventDefault();
        var path = $('#callback-form').offset().top;
        $('html, body').animate({ scrollTop: path }, 300);
    });
};

function DataURL() {
    var urlString = (location.pathname).substr(1).split('/');
    var urlParam = (location.search).substr(1).split('&');
    this.page = urlString.shift();
    this.method = urlString.shift();
    this.parametrs = {};
    this.strParametrs = urlParam;
    for (var i = 0; i < urlString.length; i += 2) {
        if (urlString[i + 1]) {
            this.parametrs[urlString[i]] = urlString[i + 1];
        };
    };
    var strData = 'page=' + this.page;
    if (this.method) {
        strData += '&method=' + this.method;
    };
    for (var key in this.parametrs) {
        strData += '&' + key + '=' + this.parametrs[key];
    };
    this.getStrDataWithExtra = function(extraOptions) {
        var extraData = this.strData;
        for (key in extraOptions) {
            extraData += '&' + key + '=' + extraOptions[key];
        };
        return extraData;
    };
    this.strData = strData;
    return this;
};


function JTPreloader() {
    // var $container = $('.JTPreloader');

    // (function createHtmlMarkup() {

    // })();

    this.init = function(element) {
        $container = $('<div>', { class: 'JTPreloader' }).prependTo($(element));
        // $container.parent().css({ position: 'relative' });
        for (var i = 0; i < 5; i++) {
            $('<div>').appendTo($container);
        }
        $container.addClass('jt-animation');
    }

    this.on = function() {
        $container.removeClass('paused');
    };
    this.off = function() {
        $container.addClass('paused');
    };
    return this;
}

function ImgViewer(elem, curIndex, header, objList) {
    var header = header || false;
    var currentIndex = curIndex;
    var arr = objList || !elem.length ? elem : $(elem).find('img');
    var preloader;

    // if (!arr.length) {
    //     arr = elem;
    // };

    function createOverlayViewer() {
        $elem = $('<div>', { class: 'viewer-overlay' }).appendTo('body');

        $elem.click(function(event) {
            $(this).fadeOut(200, function() {
                $(this).remove();
            });
        });

        return $elem.appendTo('body');
    };
    this.init = function() {

        if ($(window).width() <= mobileSize) {
            return false;
        };
        var $elem = createOverlayViewer();
        $(document).keydown(function(event) {
            if (event.which == 27 && $('.viewer-overlay').length > 0) {
                $('.viewer-overlay').click();
            };
        });

        if (header) {
            $('<div>', { id: 'viewer-upper-header' }).html('<div>' + header + '</div><div>Фотогалерея</div>').appendTo($elem);
        }

        /*Создаем элемнеты управления вперед-назад и вешаем события клика*/
        if (arr.length > 1) {

            var $btnPrev = $('<i>', { class: 'icon-left-open-big btn-prev big' }).appendTo('.viewer-overlay');
            var $btnNext = $('<i>', { class: 'icon-right-open-big btn-next big' }).appendTo('.viewer-overlay');

            $btnPrev.click(function(event) {
                event.stopPropagation();
                self.prev();
            });

            $btnNext.click(function(event) {
                event.stopPropagation();
                self.next();
            });
        };


        var $div = $('<div>', { id: 'img-viewer', class: 'inv-logo' }).appendTo($('.viewer-overlay'));
        if (header) {
            $div.css({ top: '52%' });
        }

        // var $preloader = $('<i>', { class: 'icon-spin5 animate-spin', id: 'viewer-preloader' });
        // $preloader.appendTo($div);

        $('<div>', { id: 'btn-viewer-close' }).html('<i class="icon-cancel-2"></i>').appendTo('.viewer-overlay>div#img-viewer');
        $('<div>', { id: 'title-wrapper' }).appendTo('.viewer-overlay>div#img-viewer');

        preloader = new JTPreloader();
        // preloader.init($('#img-viewer'));
        preloader.init($('.viewer-overlay'));


        // $('.viewer-overlay').on('mouseenter', 'div#title-wrapper', function(event) {
        //     $('#viewer-title').addClass('title-open').removeClass('title-close');
        // });

        // $('.viewer-overlay').on('mouseleave', 'div#title-wrapper', function(event) {
        //     $('#viewer-title').addClass('title-close').removeClass('title-open');
        // });

        // $('<div>', { id: ''}).html('Зображення <span>' + (currentIndex + 1) + '</span> із ' + arr.length).appendTo('#title-wrapper');
        $('<div>', { id: 'viewer-info' }).html('<div id="viewer-count" class="inv-count"> Зображення <span>' + (currentIndex + 1) + '</span> із ' + arr.length + '</div>').appendTo('#title-wrapper');

        $elem.fadeIn(300, function() {
            if ($btnPrev) {
                $btnPrev.addClass('anim-prev');
                $btnNext.addClass('anim-next');
            }
        });
        if (objList) {
            this.renderImg('/' + $(arr)[currentIndex].url);
        } else {
            this.renderImg($(arr).eq(currentIndex).attr('src'));
        }

    };

    this.next = function() {
        if ($(arr).eq(currentIndex + 1).length) {
            currentIndex++;
              if (objList) {
            this.renderImg('/' + $(arr)[currentIndex].url);
        } else {
            this.renderImg($(arr).eq(currentIndex).attr('src'));
        }


            $('#viewer-count>span').text(currentIndex + 1);
        } else if ($(arr).length != 1) {
            currentIndex = 0;
              if (objList) {
            this.renderImg('/' + $(arr)[currentIndex].url);
        } else {
            this.renderImg($(arr).eq(currentIndex).attr('src'));
        }

            $('#viewer-count>span').text(currentIndex + 1);
        }
    };

    this.prev = function() {
        if (currentIndex - 1 >= 0) {
            currentIndex--;
               if (objList) {
            this.renderImg('/' + $(arr)[currentIndex].url);
        } else {
            this.renderImg($(arr).eq(currentIndex).attr('src'));
        }

            $('#viewer-count>span').text(currentIndex + 1);
        } else if ($(arr).length != 1) {
            currentIndex = $(arr).length - 1;
               if (objList) {
            this.renderImg('/' + $(arr)[currentIndex].url);
        } else {
            this.renderImg($(arr).eq(currentIndex).attr('src'));
        }

            $('#viewer-count>span').text(currentIndex + 1);
        };
    };

    this.renderImg = function(src) {
        // $('.viewer-overlay>div#img-viewer>i').css({ display: 'block' });
        preloader.on();
        $('.viewer-overlay>div#img-viewer>img').removeClass('img-visible');
        $('#img-viewer').addClass('inv-logo');
        var img = new Image();
        img.onload = function() {
            function getImgSize(width, height) {
                var maxWidth = window.innerWidth * 0.86;
                var maxHeight = window.innerHeight * 0.86;

                if (width <= maxWidth * 0.85 && height <= maxHeight * 0.85) {
                    return {
                        width: Math.floor(width),
                        height: Math.floor(height)
                    };
                };
                if (width >= height) {
                    var k = width / height;
                    if (maxWidth / k < maxHeight) {
                        return {
                            width: Math.floor(maxWidth),
                            height: Math.floor(maxWidth / k)
                        };
                    } else {
                        return {
                            width: Math.floor(maxHeight * k),
                            height: Math.floor(maxHeight)
                        };
                    }
                } else if (width < height) {
                    var k = width / height;

                    if (maxHeight * k < maxWidth) {
                        return {
                            width: Math.floor(maxHeight * k),
                            height: Math.floor(maxHeight)
                        };
                    } else {
                        return {
                            width: Math.floor(maxWidth),
                            height: Math.floor(maxWidth / k)
                        };
                    }
                };
            };
            //новый размер изображения
            var ruleCSS = getImgSize(this.width, this.height);
            $elem = $('.viewer-overlay').find('img');
            // сохраняем старый размер изображения
            if ($elem.length > 0) {
                this.width = $elem.width();
                this.height = $elem.height();
            } else {
                this.width = 0;
                this.height = 0;
            };
            // удаляем старое изображение
            $('.viewer-overlay>div#img-viewer').css({ border: '3px solid white' });
            $('.viewer-overlay div#title-wrapper>img').add('div#viewer-title').remove();
            $(this).css({ display: 'block', 'border-radius': '10px' });
            
            if (objList) {
               var title = arr[currentIndex].des;
            } else {
               var title = $(arr[currentIndex]).attr('title');
            }
            
            if (title) {
                $('<div>', { id: 'viewer-title', class: 'title-close' }).appendTo($('div#viewer-info')).text(title);
            };
            $(this).appendTo($('.viewer-overlay>div#img-viewer>div#title-wrapper'));
            /* анимация перехода из размера предыдущего изображения в новые размеры 
             а также убираем прелоадер*/


            // console.log('old:' + $(this).width() + '      new:' + ruleCSS.width); 

            // $(this).css({ opacity: 0 }).animate(ruleCSS, timeAnimation, function() {
            //     var self = this;
            //     $('.viewer-overlay>div#img-viewer>i').fadeOut(50, function() {
            //         $(self).animate({ opacity: 1 }, 70);
            //     });
            //     $('.viewer-overlay>div#img-viewer>div#btn-viewer-close').css({ display: 'block' });
            // });

            var timeAnimation = 500;
            var imgClass = 'img-visible';
            if (ruleCSS.width == $(this).width() && ruleCSS.height == $(this).height()) {
                timeAnimation = 250;
                imgClass = 'img-visible-opacity';
            };
            if (ruleCSS.width < 250) {
                $(this).css({ width: '250px', height: 'auto' });
            } else {
                $(this).css({ width: ruleCSS.width + 'px', height: ruleCSS.height + 'px' });
            };

            var self = this;
            setTimeout(function() {
                // $('div.JTPreloader').fadeOut(1000, function() {
                //     preloader.off();
                //     $(self).addClass(imgClass);
                //     $('#img-viewer').removeClass('inv-logo');
                //     $('#viewer-count').removeClass('inv-count');
                // });
                preloader.off();
                $(self).addClass(imgClass);
                $('#img-viewer').removeClass('inv-logo');
                $('#viewer-count').removeClass('inv-count');
                $('#viewer-title').removeClass('title-close');
                $('div#btn-viewer-close').css({ display: 'block' });
            }, timeAnimation);
        };
        img.src = src;
        $(img).click(function(event) {
            event.stopPropagation();
            self.next();
        });
    };
    var self = this;
    return this;
};


/* Функция отправки вопроса на почту
   Выполнение проверки ответа на сервере
*/
jQuery(document).ready(function($) {
    $('footer form').submit(
        function(event) {
            $('.footer-content-col:last form').find('input').attr('disabled', 'disabled');
            event.preventDefault();
            $elem = $(this);
            var question = {};
            question.name = $elem.find('input[name="name"]').val();
            question.email = $elem.find('input[name="email"]').val();
            question.text = $elem.find('textarea').val();
            question.answer = $elem.find('input[name="answer"]').val();
            question.id = $('#question.question').attr('data-id');

            $('<i>', { class: 'icon-spin5 animate-spin' }).appendTo('.footer-content-col:last').show();
            $('<div>').appendTo('.footer-content-col:last').html('<div></div>');
            $(this).css({ opacity: '0.2' });
            $('.footer-content-col:last div').css({ display: 'block' });

            $.ajax({
                method: 'POST',
                url: "/sendmail",
                data: '&name=' + question.name + '&email=' + question.email + '&text=' + question.text + '&answer=' + question.answer + '&id=' + question.id,
                cache: false,
                dataType: 'json',
                success: function(obj) {
                    $('.footer-content-col:last>i').fadeOut(200, function() {
                        $(this).remove();
                    });


                    $('.footer-content-col:last div>div').html(obj.html);
                    $('.footer-content-col:last div>div').css({ transform: 'rotateY(0deg) translate(-50%, -50%)' });
                    $('.footer-content-col:last div').delay(200).animate({ opacity: 1 }, 200, function() {
                        var self = this;
                        setTimeout(function() {
                            $(self).remove();
                            var $elem = $('footer form').css({ opacity: 1 });
                            if (obj.notanswer) {
                                $elem = $('.footer-content-col:last').find('form');
                                $elem.find('input[name="answer"]').focus().val('');
                            };
                            if (!obj.error) {
                                var elem = $('footer form')[0];
                                elem.reset();
                                $(elem).find('#question').text(obj.newQuestion.question + ' =').attr('data-id', obj.newQuestion.id);
                            };
                            $('.footer-content-col:last form').find('input').removeAttr('disabled');
                        }, 3500);
                    });
                }
            });
        }
    );
});