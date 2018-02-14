var bookObject;
var mylib;
jQuery(document).ready(function($) {
    $.ajax({
        method: 'POST',
        url: "/books/listsubject",
        data: 'list=' + 'true',
        cache: false,
        success: function(obj) {
            var list = JSON.parse(obj);
            insertListSubject(list, true);
            getBooksForSubject($('#subject_list>.books_list_active').text());
            $('#subject_list>.books_list').click(function(event) {
                if (subscribeAction($(this))) {
                    getBooksForSubject($(this).text());
                }
            });
        }
    });
    $('#year_list').on('click', 'li', function(event) {
        event.preventDefault();
        clearBooks();
        var year = $(this).text();
        if (year == 'Всі роки') {
            $(bookObject.listbooks).each(function(index, val) {
                insertBookRow(val);
            });
        }
        $(bookObject.listbooks).each(function(index, val) {
            if (val.year == year) {
                insertBookRow(val);
            }
        });
    });
    $('#class_list').on('click', 'li', function(event) {
        event.preventDefault();
    });
    mylib = new LibraryBooks();
});

function LibraryBooks() {
    var library = [0,1];
    this.insertListSubject = function(elementForInsert) {
        /*
        функция загрузки списка с предметами для учебников
        elementForInsert - класс или id (ul) элемента DOM для вставки списка 
        */
        $.ajax({
            method: 'POST',
            url: "/books/listsubject",
            data: 'list=' + 'true',
            cache: true,
            success: function(obj) {
                var list = JSON.parse(obj);
                insertListSubject(list, true);
                getBooksForSubject($('#subject_list>.books_list_active').text());
                $('#subject_list>.books_list').click(function(event) {
                    if (subscribeAction($(this))) {
                        getBooksForSubject($(this).text());
                    }
                });
            }
        });
    };
    this.add = function(){
        library.push(10);
        return library;
    };

    this.view = function () {
        console.log(this.add());
    };
}

function subscribeAction(elem) {
    if ($(elem).attr('class') == 'books_list books_list_active') {
        return false;
    }
    $(elem).parent().find('li').removeClass('books_list_active');
    $(elem).addClass('books_list_active');
    return true;
}

function getBooksForSubject(subject) {
    $.ajax({
        method: 'POST',
        url: "/books/listbooks",
        data: 'subject=' + subject,
        cache: false,
        success: function(obj) {
            bookObject = JSON.parse(obj);
            insertOtherList(bookObject);
            clearBooks();
            $(bookObject.listbooks).each(function(index, val) {
                insertBookRow(val);
            });
        }
    });
}

function clearBooks() {
    $('#books_insert').html('');
}

function insertOtherList(obj) {
    //insert list year
    $('#year_list').html('');
    $('<li>').appendTo('#year_list').addClass('books_list books_list_active').text('Всі роки');
    $(obj.listyear).each(function(index, val) {
        $('<li>').appendTo('#year_list').addClass('books_list').text(val);
    });
    //insert list class
    $('#class_list').html('');
    $('<li>').appendTo('#class_list').addClass('books_list books_list_active').text('Всі класи');
    $(obj.listclass).each(function(index, val) {
        $('<li>').appendTo('#class_list').addClass('books_list').text(val);
    });
}


function insertListSubject(list, init ) {
    $(list).each(function(index, el) {
        $('<li>').appendTo('#subject_list').addClass('books_list').text(list[index]);
    });
    if (init) {
        $('#subject_list>.books_list').eq(0).addClass('books_list_active');
    }
}

function insertBookRow(val) {
    var $elem = $('<div>').addClass('books_item').appendTo('#books_insert');
    var $view = $('<div>').addClass('books_view_img').appendTo($elem);
    var $des = $('<div>').addClass('book_description').appendTo($elem);
    $elem = $('<div>').addClass('books_view_img_wrapper').appendTo($view);
    $('<img>').attr('src', val.img_url).appendTo($elem);
    $('<div>').html('Якщо Вам сподобалась ця книга, порекомендуйте її іншим учням <br><a href="" title="Натисніть, щоб дати рекомендацію"><i class="icon-heart"></i></a>').appendTo($elem);
    $elem = $('<div>').addClass('books_recomended').appendTo($view);
    $('<span>').text(val.count).appendTo($('<div>').appendTo($elem).html('<i class="icon-eye"></i>'));
    $('<span>').text(val.likes).appendTo($('<div>').appendTo($elem).html('<i class="icon-heart"></i>'));
    $('<a>').attr('href', val.file_url).attr('target', '_blank').attr('title', 'Натисніть для перегляду').text('ЧИТАТИ').appendTo($view);

    $('<div>').addClass('book_des_name').text(val.name).appendTo($des);
    $('<div>').html('Автори: <span>' + val.author + '</span>').appendTo($des);
    $('<div>').html('Рік: <span>' + val.year + '</span>').appendTo($des);
    $('<div>').html('Рівень: <span>' + val.level + '</span>').appendTo($des);
    $('<div>').html('Класс: <span>' + val.class + '</span>').appendTo($des);
    $('<div>').html('<span>' + val.description + '</span>').appendTo($des);
}

function compare(a, b) {
    var a = a.toLowerCase();
    var b = b.toLowerCase();

    if (a < b) {
        return -1;
    }
    if (a > b) {
        return 1;
    }
    return 0;
}
