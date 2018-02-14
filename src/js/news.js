var viewer;
var imgGallery;
var id;
var newsOnPage, oldState;
jQuery(document).ready(function($) {
    $('.count-anim').css({ color: '#f9f9f9' });
    $elem = $('.count-anim').clone().css({
        position: 'absolute',
        top: '-1em',
        'font-size': '8em',
        opacity: 0,
        color: '#a6a6a6'
    }).insertBefore('.count-anim');
    setTimeout(function() {
        $elem.animate({ 'font-size': '1em', opacity: 1, top: 0 }, 400);
    }, 200);


    getListNewsFromServer();

    activateBtnToTop($('.btn-toTop'));

    $('.btn-like').click(function(event) {
        event.stopPropagation();
        $(this).attr('disabled', 'disabled');
        var str = location.search;
        var id = str.slice(str.search('=') + 1, str.length);
        $.ajax({
            method: 'POST',
            url: "http://" + location.host + "/news/addLike",
            data: 'id=' + id,
            cache: false,
            success: function(obj) {
                var obj = JSON.parse(obj);
                if (obj.changes) {
                    $('#qt-likes').text(+$('#qt-likes').text() + 1);
                    var tmp = $('.btn-like>span').text();
                    $('.btn-like>span').text('Дякуємо, Ваша думка врахована');
                    setTimeout(function() {
                        $('.btn-like>span').text(tmp);
                        $('.btn-like').removeAttr('disabled');
                    }, 2000);
                } else {
                    var tmp = $('.btn-like>span').text();
                    $('.btn-like>span').text('Ви вже проголосували');
                    setTimeout(function() {
                        $('.btn-like>span').text(tmp);
                        $('.btn-like').removeAttr('disabled');
                    }, 2000);
                }
            }
        });
    });
    $('.btn-like span').click(function(event) {
        event.preventDefault();
        return false;
    });
    $('.btn-like div.read-msg').click(function(event) {
        event.preventDefault();
        return false;
    });

    $('.read-msg-close').click(function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).off('click');
        $(this).parent().remove();
        return false;
    });

    $('.btn-dislike').click(function(event) {
        $(this).attr('disabled', 'disabled');
        var str = location.search;
        var id = str.slice(str.search('=') + 1, str.length);
        $.ajax({
            method: 'POST',
            url: "http://" + location.host + "/news/addDislike",
            data: 'id=' + id,
            cache: false,
            success: function(obj) {
                var obj = JSON.parse(obj);
                if (obj.changes) {
                    $('.btn-dislike div').text(+$('.btn-dislike div').text() + 1);
                    var tmp = $('.btn-dislike span').text();
                    $('.btn-dislike span').text('Дякуємо, Ваша думка врахована');
                    setTimeout(function() {
                        $('.btn-dislike span').text(tmp);
                        $('.btn-dislike').removeAttr('disabled');
                    }, 2000);
                } else {
                    var tmp = $('.btn-dislike span').text();
                    $('.btn-dislike span').text('Ви вже проголосували');
                    setTimeout(function() {
                        $('.btn-dislike span').text(tmp);
                        $('.btn-dislike').removeAttr('disabled');
                    }, 2000);
                }
            }
        });
    });

    $('.oldnews_read img').click(function(event) {
        viewer = new ImgViewer($('.oldnews_read img'), $(this).index('.oldnews_read img'));
        viewer.init();
    });

    initFotoGallery();

    $(window).scroll(function(event) {
        if ($('.read-msg').length == 0) {
            return false;
        }
        var item = $(window).scrollTop() + window.innerHeight * 0.85;
        if (item >= $('.read-msg').offset().top) {
            $('.read-msg').addClass('anim');
        }
    });

    setWidthEye();

});



function getListNewsFromServer() {
    var oldNewsOnPage = newsOnPage;
    newsOnPage = $(window).width() > mobileSize ? 18 : 8;
    if (oldNewsOnPage !== newsOnPage) {
        var listNews = new ListNews(newsOnPage); // аргумент - количество ссылок новостей на странице
        listNews.getListNewsFromServer();
    };
}

function initFotoGallery() {
    var options, mobile;
    if ( $(window).width() >= mobileSize ) {
        options = { maxfotoOnPage: 6, qtOnClick: 6 };
        mobile = false;
    } else {
        options = { maxfotoOnPage: 2, qtOnClick: 3 };
        mobile = true;
    }

    if ( mobile !== oldState ) {
        imgGallery = new FotoGallery(options);
        imgGallery.getListImg();
    }
    oldState = mobile;
}

$(window).resize(function(event) {
    getListNewsFromServer();
    initFotoGallery();
});


function FotoGallery(options) {
    options = options || {
        maxfotoOnPage: 6,
        qtOnClick: 6
    };
    var listImg, downloadingFoto;
    var self = this;
    var lastIndex = 0;
    var disabled = false;

    function addEvents(item) {
        var newsHeader = $('h1.news-article-header').text();
        $(item).click(function() {
            viewer = new ImgViewer(imgGallery.fullList, $(this).index(), newsHeader, true);
            viewer.init();
        });
    }

    // function insertPreloader(container) {
    //     $(container).html('');
    //     var $div = $('<div>', { class: 'foto-gallery-preloader' });
    //     for (var i = 0; i < 3; i++) {
    //         $('<div>').appendTo($div);
    //     }
    //     $div.appendTo(container);
    // }
    this.preloaderOn = function(container) {
        $(container).find('div').remove();
        var $div = $('<div>', { class: 'foto-gallery-preloader' });
        for (var i = 0; i < 3; i++) {
            $('<div>').appendTo($div);
        }
        $div.prependTo(container);
    };

    this.preloaderOff = function(container) {
        $(container).find('div.foto-gallery-preloader').remove();
    };

    this.createListImgForViewer = function(init) {
        var countIteration;
        var length = self.listImg.length;

        if (init) {
            countIteration = length > options.maxfotoOnPage ? options.maxfotoOnPage - 2 : length - 1;
            countIteration = length === options.maxfotoOnPage ? options.maxfotoOnPage - 1 : countIteration;
        } else {
            countIteration = length > lastIndex + options.qtOnClick ? options.qtOnClick - 1 : length - lastIndex - 1;
        }
        downloadingFoto = 0;
        var beginIndex = lastIndex;
        for (var i = beginIndex; i <= beginIndex + countIteration; i++) {
            var el = self.listImg[i];
            var li = $('<li>', { class: 'hidden-foto' }).html('<div class="caption"><i class="fa fa-search"></i><div></div></div>').appendTo($('#foto-gallery'));
            $(li).css('display', 'none');
            var img = new Image();
            img.src = '/' + el.url;
            img.alt = el.des;
            img.title = el.des;
            $(img).prependTo($(li));
            lastIndex++;
            img.onload = function() {
                if (this.width < this.height) {
                    $(this).parent('li').addClass('v-size');
                }

                downloadingFoto++;
                if (downloadingFoto === countIteration + 1) {
                    $('#foto-gallery').find('i.animate-spin').remove();
                    $('#last-img-gallery').each(function(index, el) {
                        if ( !$(this).is('.hidden-foto') ) {
                            $(this).remove();
                        }
                    });
                    var $hiddenElement = $('.hidden-foto');
                    $hiddenElement.removeAttr('style');
                    setTimeout(function(){
                        $hiddenElement.removeClass('hidden-foto');
                        disabled = false;
                    },20);

                }
            };
            addEvents($(li));
        }


        self.renderLastItem(init);
    };

    this.renderLastItem = function(init) {
        if (self.listImg.length <= lastIndex) {
            return false;
        }

        var $gallery = $('#foto-gallery');


        var $li = $('<li>', { id: 'last-img-gallery', class: 'hidden-foto' }).html('<div>+' + (self.listImg.length - lastIndex ) + '</div>').appendTo($gallery);
        $li.css('display', 'none');
        $li.html($li.html() + '<img src="/' + self.listImg[lastIndex].url + '">');
        // $li.html($li.html() + '<img src="' + $('.news-article-img>img').eq(0).attr('src') + '">');


        $li.click(function(event) {
            if (disabled) {
                return false;
            }
            disabled = true;
            self.preloaderOn($(this));
            self.addItemOnClick();
        });
    };

    this.addItemOnClick = function() {
        self.createListImgForViewer();
    };
    // this.addItemsGalleryPage = function(timeDelay) {

    //     insertPreloader($('#last-img-gallery').children().eq(0));

    //     setTimeout(function() {
    //         var i = 0;
    //         var countIteration = currentListGallery.length == 0 ? 4 : 5;
    //         var isFirst = currentListGallery.length == 0 ? true : false;
    //         while (i <= countIteration) {
    //             currentListGallery.push(lostListGallery[0]);
    //             self.renderItem(lostListGallery[0], isFirst, i);
    //             if (lostListGallery) {
    //                 lostListGallery.splice(0, 1);
    //             }
    //             if (lostListGallery.length == 1) {
    //                 i--;
    //             } else {
    //                 i++;
    //             }
    //         }
    //         self.renderLastItem();
    //         $('#foto-gallery').find('li:hidden').each(function(index, el) {
    //             $img = $(this).find('img');
    //             $(this).fadeIn(1000);
    //         });
    //     }, timeDelay);
    // };

    // this.renderItem = function(item, isFirst, index) {
    //     var el = item;
    //     if (!el) { return false };
    //     var strHtml = '<img src="/' + el.url + '" alt="' + el.des + '" title="' + el.des + '">';
    //     strHtml += '<div class="caption"><i class="fa fa-search"></i><div></div></div>';
    //     var $li = $('<li>');
    //     if (!isFirst) {
    //         $li.hide();
    //     };
    //     $li.html(strHtml).appendTo($('#foto-gallery'));

    //     var img = new Image();
    //     img.src = '/' + el.url;
    //     img.onload = function() {
    //         // $li.find('img').attr({ 'data-size': img.width + 'x' + img.height, 'data-date': el.date });
    //         var $elem = $li.find('.caption div');
    //         // $elem.text(this.width + 'x' + this.height);
    //         // var date = new Date(el.date);
    //         // date = date.toLocaleString("uk-Ua", {year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric'});
    //         // $elem.find('span:last-child').text(date);
    //         if (img.width < img.height * 0.85) {
    //             $li.find('img').addClass('v-size').parent().addClass('v-size');
    //         };
    //         if (img.width / 2 > img.height) {

    //             $li.find('img').addClass('h-size');
    //         };
    //     }
    //     addEvents($li);
    // };

    // this.renderLastItem = function() {

    //     var $gallery = $('#foto-gallery');

    //     /*удаляем старую картинку*/
    //     $gallery.find('#last-img-gallery').remove();

    //     if (lostListGallery.length == 0) {
    //         return false;
    //     };

    //     /*формируем последнюю картинку*/
    //     var $li = $('<li>', { id: 'last-img-gallery' });
    //     $('<div>')
    //         .text('+' + lostListGallery.length)
    //         .appendTo($li);

    //     for (var i = 0; i < 4; i++) {
    //         var el = lostListGallery[i];
    //         if (!el) break;
    //         var $div = $('<div>');
    //         $img = $('<img>', { src: '/' + el.url, alt: el.des, title: el.des }).appendTo($div);
    //         $div.appendTo($li);
    //     }
    //     $li.appendTo($gallery);

    //     $li.on('click', function(event) {
    //         self.addItemsGalleryPage(800);
    //     });
    // };

    this.getListImg = function() {
        var str = location.search;
        var id = str.slice(str.search('=') + 1, str.length);
        $.ajax({
            method: 'POST',
            url: "http://" + location.host + "/news/getImgGallery",
            data: 'id=' + id,
            cache: false,
            success: function(obj) {
                self.listImg = self.fullList = JSON.parse(obj);
                var arrScheme = ['scheme-6f', 'scheme-6f', 'sсheme-6f-plus', 'scheme-6f-right', 'scheme-6f-right'];
                var random = Math.floor(Math.random() * (arrScheme.length - 1 + 1));
                if (self.listImg.length === 4) {
                    $('#foto-gallery').addClass('scheme-4f');
                } else
                if (self.listImg.length === 5) {
                    $('#foto-gallery').addClass('scheme-5f');
                } else
                if (self.listImg.length >= 6) {
                    $('#foto-gallery').addClass(arrScheme[random]);
                }
                $('#foto-gallery').html('<i class="icon-spin2 animate-spin"></i>');
                self.createListImgForViewer(true);
                // self.addItemsGalleryPage(0);
            }
        });
    };

    return this;
}