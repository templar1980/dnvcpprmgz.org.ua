var slider, downloadImg = 0;

function getDataForSlider() {
    var mobile = $(window).width() > mobileSize ? 0 : 1;
    $.ajax({
        url: 'http://' + location.host + '/main/mainslider',
        type: 'GET',
        dataType: 'html',
        data: {mobile: mobile},
    })
    .done(function(html) {
        $('.main-slider-img>ul').html(  $('.main-slider-img>ul').html() + html);
        $('.main-slider-img>ul img').each(function(index, el) {
            el.onload = function() {
                  downloadImg++;
                  if( downloadImg ===  $('.main-slider-img>ul img').length) {
                    initSlider();
                    $('.main-slider-img>ul>div').remove();
                }
            };
        });
    });
    
}

function initSlider() {
    var options = {
        fadeTime: 1500,
        changeTime: 7000,
        arrElemUlImg: $('.main-slider-img li'),
        arrElemTextForChanges: $('.specialty').add('.specialty-description').add('.period'),
        funForChangesText: function(index) {
            $('.specialty a').html($(options.arrElemUlImg).eq(index).attr('data-specialty'));
            $('.specialty-description').text($(options.arrElemUlImg).eq(index).attr('data-specialty-description'));
            $('.period span').text($(options.arrElemUlImg).eq(index).attr('data-period'));
        },
        cssRulesIn: {
            transform: 'rotateX(90deg)',
            // top: '20px',
            opacity: 0
        },
        cssRulesOut: {
            transform: 'rotateX(0deg)',
            // top:'0px',
            opacity: 1
        },
        controlButtons: {
            next: $('.main-slider-control i.icon-right-open-big'),
            prev: $('.main-slider-control i.icon-left-open-big'),
            buttonPlayPause: $('.main-slider-control i.btn-play-pause'),
            play: 'icon-play',
            stop: 'icon-pause'
        }
    };
    slider = mainSlider(options);
    slider.setDescription(0);
    slider.subscribeButton();
    slider.run();
}

function mainSlider(options) {
    if (!options) {
        console.log('Please set options');
        return false;
    };
    var $elem = options.arrElemUlImg,
        $arrElem = options.arrElemTextForChanges,
        $img = $elem.find('img'),
        currentIndex = 0,
        self, id;
    var animTime = ((options.fadeTime - 200) / 1000) / 2,
        animDelay = animTime / 3;
    return {
        setDescription: options.funForChangesText,
        nextImg: function() {
            $elem.eq(currentIndex).fadeOut(options.fadeTime);
            currentIndex = (currentIndex + 2 <= $elem.length) ? currentIndex += 1 : 0;
            $elem.eq(currentIndex).fadeIn(options.fadeTime);
            self.fadeOutDescription();
        },
        prevImg: function() {
            $elem.eq(currentIndex).fadeOut(options.fadeTime);
            currentIndex = (currentIndex - 1 >= 0) ? currentIndex -= 1 : $elem.length - 1;
            $elem.eq(currentIndex).fadeIn(options.fadeTime);
            self.fadeOutDescription();
        },
        buttonNext: function() {
            if (id) {
                self.stop();
                self.nextImg();
                self.run();
            } else {
                self.nextImg();
            }
        },
        buttonPrev: function() {
            if (id) {
                self.stop();
                self.prevImg();
                self.run();
            } else {
                self.prevImg();
            }
        },
        subscribeButton: function() {
            $(options.controlButtons.prev).click(function() {
                self.buttonPrev();
            });
            $(options.controlButtons.next).click(function() {
                self.buttonNext();
            });
            $(options.controlButtons.buttonPlayPause).click(function() {
                if ($(this).attr('class').indexOf(options.controlButtons.play) > 0) {
                    self.stop();
                    $(this).fadeOut(300, function() {
                        $(this).removeClass(options.controlButtons.play).addClass(options.controlButtons.stop).delay(20).fadeIn(300);
                    });
                } else {
                    if (!id) {
                        self.run();
                        $(this).fadeOut(300, function() {
                            $(this).removeClass(options.controlButtons.stop).addClass(options.controlButtons.play).delay(20).fadeIn(300);
                        });
                    };
                }
            });
            // $(options.controlButtons.stop).click(function() {
            //     self.stop();
            // });
        },
        fadeOutDescription: function() {
            $arrElem.each(function(index) {
                $(this).css({
                    'transition-delay': animDelay * index + 's',
                });
            });
            setTimeout(function() {
                $arrElem.css(options.cssRulesIn);
            }, 10);
            setTimeout(function() {
                self.setDescription(currentIndex);
                self.fadeInDescription();
            }, options.fadeTime / 2);
        },
        fadeInDescription: function() {
            $arrElem.each(function(index, el) {
                $(this).css({
                    'transition-delay': animDelay * index + 's'
                });
            });
            setTimeout(function() {
                $arrElem.css(options.cssRulesOut);
            }, 10);
        },
        run: function() {
            self = this;
            $arrElem.css({
                'transition-property': 'all',
                'transition-duration': animTime + 's',
                'transition-timing-function:': 'ease-out'
            });
            id = setInterval(self.nextImg, options.changeTime);
        },
        stop: function() {
            clearInterval(id);
            id = 0;
        },
        view: function() {
            console.log(id);
        }
    }
}
