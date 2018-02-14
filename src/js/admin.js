var selectedText;
jQuery(document).ready(function($) {

    $('.admin-header h1').text($('.control-panel ul').find('li.active').text());
    $('.admin-header h2').text(location.origin);

    $('#addTags').click(function(event) {
        var text = $('#article-text').val();
        if (text) {
            text = addTagsP(text);
            $('#article-text').val(text);
        }
    });

    $('.control-panel ul').find('li').click(function(event) {
        var selector = '#' + $(this).attr('data-id');
        $('.content>*').fadeOut(50);
        $(this).parent().find('li.active').removeClass('active');
        $(this).addClass('active');

        $(selector).fadeIn(200);
        $('.admin-header h1').text($(this).text());
    });

    $('#slide').click(function(event) {
        $(this).parent().find('#img-pre').slideToggle(50);
    });


    $("#files").change(function() {
        readURL(this);
    });

    $('form#addNews').submit(function(event) {
        event.stopPropagation();
        event.preventDefault();

        $('#result-win').addClass('opened');
        $('#result-win .win-active').removeClass('win-active');
        $('#result-win-preloader').addClass('win-active');

        var data = {};
        var arrData = [];
        data.header = $('#article-header').val();
        data.text = $('#article-text').val();
        data.files = [];

        $('#img-pre').find('tr.img-table-row').each(function(index, el) {
            var obj = {};
            var elem = $(el).find('input[type="radio"]').get(0);
            if (elem) {
                obj.isMain = elem.checked ? 1 : 0;
                obj.description = $(el).find('input[type="text"]').val();
            }
            (data.files).push(obj);
        });

        arrData.push(data);


        var files = $('#files').get(0).files;
        var data = new FormData();
        $.each(files, function(key, value) {
            data.append(key, value);
        });

        data.append('data', JSON.stringify(arrData));
        var aj = $.ajax({
            url: '/admin/addNews',
            type: 'POST',
            data: data,
            cache: false,
            // dataType: 'json',
            processData: false, // Не обрабатываем файлы (Don't process the files)
            contentType: false, // Так jQuery скажет серверу что это строковой запрос
            success: function(respond, textStatus, jqXHR) {
                $('#result-win>div').html(respond);
                $('#result-win .win-active').removeClass('win-active');
                $('#result-box').addClass('win-active');
            },
            error: function(jqXHR, textStatus, errorThrown) {

            },
        });
    });

    $('#result-win-btn-close').click(function(event) {
        $('#result-win').removeClass('opened');
    });

    $('#addBold').click(function(event) {
        insertTag('<strong>', '</strong>');
    });

     $('#addItalic').click(function(event) {
        insertTag('<i>', '</i>');
    });

    $('#addCommenting').click(function(event) {
        insertTag('<div class=\"commet\"><i class=\"fa fa-commenting\"></i>', '</div>');
    });

});

function insertTag(tagStart, tagEnd) {
    var textarea = $('#article-text')[0];

    var strBefore = $(textarea).val().substr(0, textarea.selectionStart);
    var strAfter = $(textarea).val().substr(textarea.selectionEnd);
    var strReplace = $(textarea).val().substring(textarea.selectionStart, textarea.selectionEnd);
    strReplace = tagStart + strReplace + tagEnd;
    $(textarea).val(strBefore + strReplace + strAfter);
}

function readURL(input) {
    $('#img-pre').find('tr.img-table-row').remove();

    if (input.files) {

        $(input.files).each(function(index, el) {
            var $tr = $('<tr>', { class: 'img-table-row' }).appendTo($('#img-pre'));
            var $td = $('<td>').appendTo($tr);

            el.id = 'file_' + index;
            $('<img>').attr('id', el.id).appendTo($td);

            $('<span>').text(el.name).appendTo($td);
            $td = $('<td>').appendTo($tr);

            $('<input>').attr('type', 'text').appendTo($td);
            $td = $('<td>').appendTo($tr);

            if (!index) {
                $('<input>', { type: 'radio', name: 'isMain', checked: 'checked' }).appendTo($td);
            } else {
                $('<input>', { type: 'radio', name: 'isMain' }).appendTo($td);
            }

        });

        $(input.files).each(function(index, el) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + el.id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[index]);
        });
    }
}

function addTagsP(text) {
    var text = text.replace(/\n/g, '</tag--p>');
    var arr = text.split('</tag--p>');
    text = '';
    $(arr).each(function(index, el) {
        text += '<p>' + el + '</p>' + '\r\n';
    });

    text = text.replace(/ – /g, ' &ndash; ');
    return text;
}