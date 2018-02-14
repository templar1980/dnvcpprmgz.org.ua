var startRequest;
jQuery(document).ready(function($) {
    $('.search form').submit(function(event) {
        event.preventDefault();
        var objData = dataCollection();
        if ((objData.searchString).length < 4) {
            $('#search-result').html('<div class="no-result">Запит повинен містити не менше 4 символів</div>');
            return false;
        };
        objData.searchString = (objData.searchString).replace("'", "\\'");
        startRequest = new Date();
        $.ajax({
            method: 'POST',
            url: "http://" + location.host + "/search/result",
            data: 'searchString=' + objData.searchString + '&allPages=' + objData.allPages,
            cache: false,
            dataType: 'html',
            success: function(obj) {
                $('#search-result').html(obj);
                $('#time-request').text((new Date() - startRequest) / 1000);
            }
        });
    });
});

function dataCollection() {
    var allPages;
    $('input[type="radio"]').each(function() {
        if ($(this).is(':checked')) {
            allPages = $(this).val();
        };
    });


    var arrWords = ($('input[type="search"]').val()).split(' ');

    // ранжирование
    // $(arrWords).each(function(index, el) {

    //     if (el.length - 1 >= 4) {
    //         arrWords.push(el.substr(0, el.length - 1));
    //     };

    // });

    var arrSearch = [];
    $(arrWords).each(function(index, el) {
        if (el.length >= 4) {
            arrSearch.push(el.toLowerCase());
            arrSearch.push(el[0].toUpperCase() + el.substr(1));
        };
    });

    return {
        searchString: arrSearch.join(','),
        allPages: allPages
    }
}