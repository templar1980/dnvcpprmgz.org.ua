var viewer;
jQuery(document).ready(function($) {
    $('#license_p1 li').click(function() {
        viewer = new ImgViewer($('#license_p1 li'), $(this).index());
        viewer.init();
    });
    // $('#license_p2 li').click(function(){
    //  viewer = new ImgViewer($('#license_p2 li'), $(this).index());
    //            viewer.init();
    // });
    $('#certificate li').click(function() {
        viewer = new ImgViewer($('#certificate li'), $(this).index());
        viewer.init();
    });
    $('#attestation li').click(function() {
        viewer = new ImgViewer($('#attestation li'), $(this).index());
        viewer.init();
    });

    $('.openinf ul li img').click(function() {
        viewer = new ImgViewer($(this).parent('li'), 0);
        viewer.init();
    });

});