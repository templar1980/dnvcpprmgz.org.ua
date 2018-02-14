var preloader, owl, jtViewer;

/*VAR*/

var objAlbum = [
{
        name: 'Адміністративний корпус',
        location: '',
        folderPath: '/img/jt/admin/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Приймальна комісія',
        location: '',
        folderPath: '/img/jt/priyom/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Тренінговий кабінет',
        location: '',
        folderPath: '/img/jt/trening/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Актовий зал',
        location: '',
        folderPath: '/img/jt/act_zal/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Гуртожиток',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/gurt_vatb/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            }

        ]
    },
    {
        name: 'Їдальня',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/idal_vatb/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            }

        ]
    },
    {
        name: 'Кабінет інформатики та інформаційних технологій',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/inform_avto/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Кабінет оздоблювачів',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/ozdob_avto/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Кабінет правил дорожнього руху',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/pravila_avto/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            },
            {
                name: '9.jpg',
                des: ''
            },
            {
                name: '10.jpg',
                des: ''
            },
            {
                name: '11.jpg',
                des: ''
            }

        ]
    },
    {
        name: 'Майстерня оздоблювачів',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/master_ozdob/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Майстерня слюсарів-ремонтників',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/master_remont/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            },
            {
                name: '9.jpg',
                des: ''
            },
            {
                name: '10.jpg',
                des: ''
            },
            {
                name: '11.jpg',
                des: ''
            },
            {
                name: '12.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Майстерня оформлювачів вітрин',
        location: 'Відділення автотранспорту та будівництва',
        folderPath: '/img/jt/master_oformitel/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            }
        ]
    },
    
    {
        name: 'Кабінет cпецтехнології професій електрозв\'язку',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/spec_elektroz/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Кабінет cпецтехнології електрогазозварників',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/spec_elektrogaz/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Кабінет cпецтехнології токарів',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/spec_tokar/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Майстерня електрогазозварювання',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/master_elektrogaz/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            },
            {
                name: '9.jpg',
                des: ''
            },
            {
                name: '10.jpg',
                des: ''
            },
            {
                name: '11.jpg',
                des: ''
            },
            {
                name: '12.jpg',
                des: ''
            },
            {
                name: '13.jpg',
                des: ''
            },
            {
                name: '14.jpg',
                des: ''
            },
            {
                name: '15.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Майстерня електромонтажників',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/master_elektromontag/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Майстерня слюсарів',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/master_slesar/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Майстерня токарів',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/master_tokar/',
        albumDescription: ' ',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            },
            {
                name: '8.jpg',
                des: ''
            },
            {
                name: '9.jpg',
                des: ''
            },
            {
                name: '10.jpg',
                des: ''
            },
            {
                name: '11.jpg',
                des: ''
            },
            {
                name: '12.jpg',
                des: ''
            },
            {
                name: '13.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Їдальня',
        location: 'Відділення машинобудування',
        folderPath: '/img/jt/idal_vm/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            }

        ]
    },
    {
        name: 'Спортивний оздоровчий комплекс',
        location: '',
        folderPath: '/img/jt/ozdor_komplex/',
        albumDescription: '«Хто розраховує забезпечити собі здоров\'я, перебуваючи в ліні, той чинить так само безглуздо, як і людина, яка думає мовчанням удосконалити свій голос.»',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Зал боксу',
        location: '',
        folderPath: '/img/jt/box_zal/',
        albumDescription: 'Програний бій завжди дає тобі зрозуміти, що щось ти робиш неправильно.',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            },
            {
                name: '5.jpg',
                des: ''
            },
            {
                name: '6.jpg',
                des: ''
            },
            {
                name: '7.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Тренажерний зал',
        location: '',
        folderPath: '/img/jt/tren_zal/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            },
            {
                name: '3.jpg',
                des: ''
            },
            {
                name: '4.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Спортивний зал',
        location: '',
        folderPath: '/img/jt/sport_zal/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            }
        ]
    },
    {
        name: 'Кімната для тенісу',
        location: '',
        folderPath: '/img/jt/tenis_zal/',
        albumDescription: '',
        listImg: [{
                name: '1.jpg',
                des: ''
            },
            {
                name: '2.jpg',
                des: ''
            }
        ]
    },




];


/*VAR*/


jQuery(document).ready(function($) {
    jtViewer = new JTWiever();
    preloader.on();
    jtViewer.loadListAlbums();

    // jtViewer.setCurrentAlbum(0);
    // jtViewer.setCurrentImg(0);
    $('#jtAlbumViewer').fadeIn(200, function() {
        $('div.list-albums-item').each(function(index, el) {
            $(this).addClass('animation').css('transition-delay', index * 0.1 + 's');
        });;
    });

    $('#first-win').find('div.list-albums-item').click(function(event) {
        var self = this;
        $('#first-win').fadeOut(200, function() {
            jtViewer.setCurrentAlbum($(self).index());
            jtViewer.setCurrentImg(0);
        });
    });

    // $('#btn-view').click(function(event) {
    //     event.stopPropagation();
    //     event.preventDefault();
    //     // jtViewer.setCurrentAlbum(0);
    //     // jtViewer.setCurrentImg(0);
    //     $('#jtAlbumViewer').fadeIn(400);
    // });

    $('#thumbnails-close').click(function(event) {
        // $('#jtAlbumViewer').fadeOut(300);
        location.href = '/';
    });


});

$(document).on('load', function() {
    $('.thumbnails-wrapper ul li img').each(function(index, el) {
        $(this).width($(this).width());
    });
});

function preloaderAlbums() {
    var $container = $('.JTPreloader');

    (function createHtmlMarkup() {
        $container.parent().css({ position: 'relative' });
        for (var i = 0; i < 5; i++) {
            $('<div>').appendTo($container);
        }
    })();

    this.on = function() {
        $container.addClass('jt-animation');
    };
    this.off = function() {
        $container.fadeOut(100, function() {
            $(this).removeClass('jt-animation');
        });
    };
    return this;
}

function JTWiever() {
    var currentAlbum, currentImg;
    var lengthArrItems = 0;
    var self = this;
    preloader = new preloaderAlbums();

    this.getCurrentImg = function() {
        return currentImg;
    };

    this.loadListAlbums = function() {
        $(objAlbum).each(function(index, el) {
            var $wrap = $('<div>').addClass('list-albums-item');
            var $elem = $('<div>').addClass('list-albums-img-wrapper');
            $('<img>', { src: el.folderPath + 'thumb/' + el.listImg[0].name }).appendTo($elem);
            $('<span>').html('<strong>' + (el.listImg).length + '</strong>зображень').appendTo($elem);
            $elem.appendTo($wrap);
            $('<span>').text(el.name).appendTo($wrap);
            $('<span>').text(el.location).appendTo($wrap);

            $wrap.appendTo($('div.list-albums'));

            $wrap.click(function(event) {
                event.stopPropagation();
                event.preventDefault();
                self.setCurrentAlbum($(this).index());
            });
        });
        $('#btn-next-foto').add('.img-wrapper').click(function(event) {
            event.stopPropagation();
            event.preventDefault();
            var index = self.getCurrentImg();
            if (index + 1 <= lengthArrItems - 1) {
                self.setCurrentImg(index + 1);
            };
        });

        $('#btn-prev-foto').click(function(event) {
            event.stopPropagation();
            event.preventDefault();
            var index = self.getCurrentImg();
            if (index - 1 >= 0) {
                self.setCurrentImg(index - 1);
            };
        });
    };

    this.loadThumbnails = function() {
        var container = $('div.thumbnails-viewer div.owl-carousel.owl-theme');
        var folderPath = objAlbum[currentAlbum].folderPath;
        lengthArrItems = objAlbum[currentAlbum].listImg.length;

        $(objAlbum[currentAlbum].listImg).each(function(index, el) {
            var div = $('<div>').addClass('item').css({width:'auto', height: $('#jtAlbumViewer .thumbnails-viewer').height() + 'px'});
            if (index === currentImg) {
                $(div).addClass('active');
            };
            $('<img>', { src: folderPath + 'thumb/' + el.name }).appendTo($(div));
            $(div).appendTo($(container));

            $(div).click(function(event) {
                event.stopPropagation();
                event.preventDefault();
                self.setCurrentImg($(this).parent().index());
            });
        });

        // insert panel img
        $('#panel-log').html('');
        $('<img>', { src: folderPath + 'thumb/' + 'panel.png' }).appendTo($('#panel-log'));
    };

    this.insertAlbumName = function() {
        var name = objAlbum[currentAlbum].name;
        var location = objAlbum[currentAlbum].location;
        var text = objAlbum[currentAlbum].albumDescription;
        $('.foto-info').find('h2').text(name);
        $('.foto-info').find('h3').text(location);
        $('.foto-info').find('p').text(text);
    };

    this.renderImg = function() {
        preloader.on();
        // $('#image-view').remove();
        $('#text-info-foto').hide();
        $('#btn-info-foto').hide();

        var img = new Image();
        img.src = objAlbum[currentAlbum].folderPath + 'img/' + objAlbum[currentAlbum].listImg[currentImg].name;
        //$(img).attr('id', 'image-view').css({ opacity: 0 }).prependTo('div.img-wrapper');

        img.onload = function() {
            preloader.off();
            var width = $('div.foto-viewer').width();
            var height = $('div.foto-viewer').height();

            if (this.height > this.width) {
                $(this).css({
                    width: 'auto',
                    height: height
                });
            } else {
                $(this).css({
                    width: width,
                    height: 'auto'
                });
            };
            $('#image-view').remove();
            $(this).attr('id', 'image-view').prependTo('div.img-wrapper').css({ opacity: 1 });

            $('#file-px').text(this.naturalWidth + 'x' + this.naturalHeight);

            $('#btn-info-foto').show();
            var txt = objAlbum[currentAlbum].listImg[currentImg].des;
            if (txt) {
                $('#text-info-foto').text(txt).show();
            };
        };
    };

    this.setCurrentAlbum = function(index) {

        if (index === currentAlbum) return false;

        $(owl).html('');
        currentAlbum = index;
        currentImg = 0;

        self.insertAlbumName();
        self.loadThumbnails();
        runOwlCarousel();
        self.setCurrentImg(0);
    };

    this.setCurrentImg = function(index) {
        currentImg = index;
        $('.item.active').removeClass('active');
        $('.owl-item').eq(currentImg).find('.item').addClass('active');
        $('#current-img').text(currentImg + 1);
        $('#img-length').text(lengthArrItems);
        self.renderImg();
    };

    return this;
}



function runOwlCarousel() {
    owl = $('.owl-carousel');
    owl.trigger('destroy.owl.carousel');
    owl.owlCarousel({
        animateOut: '',
        animateIn: '',
        loop: false,
        margin: 8,
        lazyLoad: false,
        autoPlay: false,
        autoPlayTimeout: 10000,
        autoHeight: false,
        autoWidth: true,
        stagePadding: 0,
        smartSpeed: 400,
        dots: false,
        onTranslate: '',
        onTranslated: '',
        nav: false
    });

    $('#thumbnails-prev').off('click');
    $('#thumbnails-next').off('click');

    $('#thumbnails-prev').click(function(event) {
        event.stopPropagation();
        event.preventDefault();
        owl.trigger('prev.owl.carousel');
    });

    $('#thumbnails-next').click(function(event) {
        event.stopPropagation();
        event.preventDefault();
        owl.trigger('next.owl.carousel');
    });

};