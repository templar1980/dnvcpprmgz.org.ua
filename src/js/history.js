var viewer;
jQuery(document).ready(function($) {
	 $('.img_block>div').click(function(event) {
        viewer = new ImgViewer($('.img_block>div'), $(this).index('.img_block>div'));
        viewer.init();
    });

	 $('.zal>ul li').click(function() {
        viewer = new ImgViewer($('.zal>ul li'), $(this).index('.zal>ul li'));
        viewer.init();
    });
});