var viewer;
jQuery(document).ready(function($) {
    
    $('div.content').css({ 'padding': '20px 100px 15px 30px' });
   
    $('person_main_info img').imagesLoaded(function() {
        
        $('h1>span').add('.person_main_info img').css({ opacity: 1, transform: 'none' });
        $('.person-left-line').css({height:'100%'});
        $('.person_position>span').css({left:'0', opacity:1});
        $('.person_info').css({ opacity: 1 });

        $('.person_main_info img').click(function(event) {
            viewer = new ImgViewer($('.person_main_info img'), $(this).index('.person_main_info img'));
            viewer.init();
        });

        $('#license_p1 li').click(function(event) {
            viewer = new ImgViewer($('#license_p1 li'), $(this).index('#license_p1 li'));
            viewer.init();
        });
    });
   
    $('.collective').imagesLoaded(function() {
        animationFlipp();
    });

});



function animationFlipp() {
    var arr = $('.collective_list_item');
    var length = arr.length / 2;
    var animTime = 1.2;
    var delay, step;
    delay = 0;
    step = 0.1;
    while (arr.length != 0) {
        var qtImg = 1;
        for (var i = 0; i < qtImg; i++) {
            var rand = Math.floor(Math.random() * arr.length);
            $(arr[i]).css({ animation: 'anim2 ' + animTime + 's ' + delay + 's forwards' });
            arr.splice(i, 1);
        }
        var tmp = (Math.random() * 0.05);
        delay = delay + step + tmp;
    }
}