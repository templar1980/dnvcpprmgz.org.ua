var mobileSize = 750;

jQuery(document).ready(function($) {
    
    // if ($(window).width() > 490) {
    //     $('img.mb-img-hidden').each(function(index, el) {
    //     	$(this).attr('src', $(this).attr('data-src'));
    //     });
    // };

    addGsInformer();
    youtubeChannel();

    // $('img').each(function(index, el) {
    // 	if (!$(this).is(':visible')) {
    // 		$(this).attr('src', '');
    // 	}
    // });

});

$(window).resize(function(event) {
    
    if ($(window).width() > mobileSize) {
        $('img.mb-img-hidden').each(function(index, el) {
        	$(this).attr('src', $(this).attr('data-src'));
        });
    };

    addGsInformer();
    youtubeChannel();
});


function addGsInformer() {

    if ($(window).width() <= mobileSize || !$('div.gis-inform').is(':empty')) {
        return false;
    };

    $.ajax({
            url: '/main/gsinformer',
            dataType: 'html',
            data: { id: 1 },
        })
        .done(function(html) {
            $('div.gis-inform').html(html);
        })

}


function youtubeChannel() {
    var idYoutubeChannel = 'UCm8p2XTbLVcMAfM_QCJ2A6Q';
    if ($(window).width() <= mobileSize || !$('div.youtube').is(':empty')) {
        return false;
    };

    $.ajax({
        url: "https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=" + idYoutubeChannel + "&key=AIzaSyDUmOL4KdDgEQewmIewR_l4peBOkKqkCig",
        success: function(obj) {
            var idUploads = obj.items[0].contentDetails.relatedPlaylists.uploads;
            $.ajax({
                url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=1&playlistId=" + idUploads + "&key=AIzaSyDUmOL4KdDgEQewmIewR_l4peBOkKqkCig",
                success: function(obj) {
                    var videoId = 'https://www.youtube.com/embed/' + obj.items[0].snippet.resourceId.videoId;
                    // $('#last-youtube-video').attr('src', videoId);
                    $.ajax({
                            url: '/main/youtube',
                            dataType: 'html',
                            data: { src: videoId },
                        })
                        .done(function(html) {
                            $('div.youtube').html(html);
                        })
                }
            });
        }
    });
}