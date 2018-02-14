var viewer;
jQuery(document).ready(function($) {
	 $('.foto_award>img').click(function(event) {
        viewer = new ImgViewer($('.foto_award'), $(this).index('.foto_award>img'));
        viewer.init();
    });

	  $('.item_specialty img').click(function(event) {
        viewer = new ImgViewer($('.item_specialty'), $(this).index('.item_specialty img'));
        viewer.init();
    });

    $('.foto-group img').click(function(event) {
        viewer = new ImgViewer($('.foto-group'), $(this).index('.foto-group img'));
        viewer.init();
    });

});