var lib;
jQuery(document).ready(function($) {
    lib = new LibraryBooks();
    lib.downloadListSubject();
    lib.view();
});

function LibraryBooks() {
    var listBooks;
    var activeOption = {};
    var currentListBook;
    var self = this;

    function activateEvents() {

        $('#subject_list').on('click', 'li', function(event) {
            event.preventDefault();
            changeActiveItemList($(this));
            saveActiveOptions();
            $('.books_view_sort select').removeAttr('disabled');
            $('#books_search input[type="text"]').val('');
            self.downloadBooksForActiveSubject();

        });

        $('#year_list').on('click', 'li', function(event) {
            event.preventDefault();
            changeActiveItemList($(this));
            saveActiveOptions();
            self.insertListBooks();

        });
        $('#class_list').on('click', 'li', function(event) {
            event.preventDefault();
            changeActiveItemList($(this));
            saveActiveOptions();
            self.insertListBooks();
        });

        $('.books_view_sort').on('change', 'select', function(event) {
            saveActiveOptions();
            self.insertListBooks();
        });

        $('#books_search').submit(function(event) {
            event.preventDefault();
            var string = $(this).find('input[type="text"]').val();
            if (!string) {
                return false;
            }
            $.ajax({
                method: 'POST',
                url: "/books/search",
                data: 'string=' + string,
                cache: true,
                success: function(obj) {
                    listBooks.listbooks = JSON.parse(obj);
                    saveActiveOptions();
                    activeOption.year = 'Всі роки';
                    activeOption.class = 'Всі класи';
                    $('.books_view_sort select').attr('disabled', 'disabled');
                    $('#subject_list').find('li').removeClass('books_list_active');
                    $('#class_list').find('li').remove();
                    $('#year_list').find('li').remove();
                    if (listBooks.listbooks.length == 0) {
                        $('#books_insert').html('<div class="books_search_notfound">По даному запиту нічого не знайдено. Спробуйте точніше вказати Ваш запит...</div>');
                    } else {
                        self.insertListBooks();
                    }
                }
            });
            /* Act on the event */
        });

        $('#books_search input[type="text"]').on('keydown', function(event) {
            if (event.which == 13) {
                $('#books_search').submit();
            }
        });

        $('#books_search_cancel').on('click', function(event) {
            event.preventDefault();
            $('#books_search input[type="text"]').val('');
            $('#subject_list').find('li').removeClass('books_list_active').eq(0).addClass('books_list_active');
            saveActiveOptions();
            $('.books_view_sort select').removeAttr('disabled');
            self.downloadBooksForActiveSubject();
        });

    }

    function sortListBookBy(value) {
        if (value == 'count') {
            currentListBook.sort(function(a, b) {
                if (+a.count < +b.count) {
                    return 1;
                } else {
                    return -1;
                }
            });
        }
        if (value == 'year') {
            currentListBook.sort(function(a, b) {
                if (+a.year < +b.year) {
                    return 1;
                } else {
                    return -1;
                }
            });
        }
        if (value == 'name') {
            currentListBook.sort(function(a, b) {
                if (a.name < b.name) {
                    return 1;
                } else {
                    return -1;
                }
            });
        }
        if (value == 'class') {
            currentListBook.sort(function(a, b) {
                if (+a.class < +b.class) {
                    return 1;
                } else {
                    return -1;
                }
            });
        }
        if (value == 'likes') {
            currentListBook.sort(function(a, b) {
                if (+a.likes < +b.likes) {
                    return 1;
                } else {
                    return -1;
                }
            });
        }
    }

    function insertList(elementForInsert, list) {
        /*
        функция вставки в DOM  загруженного списка для учебников
        elementForInsert - класс или id (ul) элемента DOM для вставки списка 
        */
        $(elementForInsert).html('');
        $(list).each(function(index, value) {
            var $elem = $('<li>').addClass('books_list').text(value).appendTo(elementForInsert);
            if (index == 0) {
                $elem.addClass('books_list_active');
            }
        });
    }

    function changeActiveItemList(newItemList) {
        $(newItemList).parent().find('li').removeClass('books_list_active');
        $(newItemList).addClass('books_list_active');
    }

    function saveActiveOptions() {
        activeOption.subject = $('#subject_list').find('.books_list_active').text();
        activeOption.year = $('#year_list').find('.books_list_active').text();
        activeOption.class = $('#class_list').find('.books_list_active').text();
        activeOption.sort = $('.books_view_sort option:selected').val();
    }

    function insertBooksRow(rowData, elementForInsert) {
        /*
        	создание и вставка элементов DOM в
        	elementForInsert - элемент для вставки книг, id или класс
        */
        var $elem = $('<div>').addClass('books_item').appendTo(elementForInsert);
        var $view = $('<div>').addClass('books_view_img').appendTo($elem);
        var $des = $('<div>').addClass('book_description').appendTo($elem);
        $elem = $('<div>').addClass('books_view_img_wrapper').appendTo($view);
        $('<img>').attr('src', rowData.img_url).appendTo($elem);
        $('<div>', {class: 'caption'}).html('<span>Якщо Вам сподобалась ця книга, порекомендуйте її іншим учням </span> <a href="" class="btn_book_addlike" title="Натисніть, щоб дати рекомендацію" data-id="' + rowData.id + '"><i class="icon-heart"></i>Рекомендую</a>').appendTo($elem);
        $elem = $('<div>').addClass('books_recomended').appendTo($view);
        $('<span>').text(rowData.count).addClass('book_count').appendTo($('<div>').appendTo($elem).html('<i class="icon-eye"></i>'));
        $('<div>', {class:'like-for-book'}).appendTo($elem).html('<i class="icon-heart"></i><span class="book_likes">' + rowData.likes + '</span>');
        $('<a>').addClass('btn_book_addcount').attr('href', rowData.file_url).attr('target', '_blank').attr('title', 'Натисніть для перегляду').attr('data-id', rowData.id).text('ЧИТАТИ').appendTo($view);

        $('<div>').addClass('book_des_name').text(rowData.name).appendTo($des);
        $('<div>').html('Автори: <span>' + rowData.author + '</span>').appendTo($des);
        $('<div>').html('Рік: <span>' + rowData.year + '</span>').appendTo($des);
        $('<div>').html('Рівень: <span>' + rowData.level + '</span>').appendTo($des);
        $('<div>').html('Класс: <span>' + rowData.class + '</span>').appendTo($des);
        $('<div>').html('<span>' + rowData.description + '</span>').appendTo($des);


    }

    this.downloadListSubject = function() {
        /*
        функция загрузки списка с предметами для учебников
        происходит единожды при загрузке страницы
        */
        activateEvents();
        $.ajax({
            method: 'POST',
            url: "/books/listsubject",
            data: 'list=' + 'true',
            cache: true,
            success: function(obj) {
                var listSubject = JSON.parse(obj);
                insertList('#subject_list', listSubject);
                saveActiveOptions();
                self.downloadBooksForActiveSubject();
            }
        });
    };

    this.downloadBooksForActiveSubject = function() {
        $.ajax({
            method: 'POST',
            url: "/books/listbooks",
            data: 'subject=' + activeOption.subject,
            cache: true,
            success: function(obj) {
                listBooks = JSON.parse(obj);
                self.insertListYear('#year_list');
                self.insertListClass('#class_list');
                saveActiveOptions();

                self.insertListBooks();
            }
        });
    };

    this.insertListYear = function(elementForInsert) {
        insertList(elementForInsert, listBooks.listyear);
    };

    this.insertListClass = function(elementForInsert) {
        insertList(elementForInsert, listBooks.listclass);
    };

    this.insertListBooks = function() {
        /*
        вывод списка книг, сначала фильт вотом сортировка и вывод
        */
        $('#books_insert').html('');
        currentListBook = [];

        $(listBooks.listbooks).each(function(index, el) {
            currentListBook[index] = el;
        });

        // var obj = listBooks.listbooks;
        /*Фильтр по годам*/
        if (activeOption.year !== 'Всі роки') {
            for (var i = currentListBook.length - 1; i >= 0; i--) {
                if (currentListBook[i].year != activeOption.year) {
                    currentListBook.splice(i, 1);
                }
            }
        }

        /*Фильтр по классам*/
        if (activeOption.class !== 'Всі класи') {

            for (var i = currentListBook.length - 1; i >= 0; i--) {
                if (currentListBook[i].class != activeOption.class) {
                    currentListBook.splice(i, 1);
                }
            }
        }

        /*Сортировка*/
        sortListBookBy(activeOption.sort);

        $(currentListBook).each(function(index, value) {
            insertBooksRow(value, '#books_insert');
        });

        $('.books_view_img').on('click', 'a.btn_book_addcount', function(event) {
            // event.preventDefault();
            changeCount(1, $(this).attr('data-id'), currentListBook, event.currentTarget);
        });
        $('.books_view_img_wrapper').on('click', 'a.btn_book_addlike', function(event) {
            event.preventDefault();
            changeCount(2, $(this).attr('data-id'), currentListBook, event.currentTarget);
        });
    };

    function changeCount(count, id, currentListBook, target) {
        var target = target;
        $.ajax({
            method: 'POST',
            url: "/books/addCount",
            data: 'column=' + count + '&id=' + id,
            cache: false,
            success: function(obj) {
                var req = JSON.parse(obj);
                if (req) {
                    if (count == 1) {
                        $(currentListBook).each(function(index, val) {
                            if (val.id == id) {
                                val.count++;
                                $(target).parent().find('.book_count').text(val.count);

                                
                            }
                        });
                    } else {
                        $(currentListBook).each(function(index, val) {
                            if (val.id == id) {
                                val.likes++;
                                $('#tmp-win').remove();
                                var $elem = $(target).parents('.books_view_img').find('.books_recomended');
                                $elem.find('span.book_likes').text(val.likes);
                                $elem = $('<div>', {id: 'tmp-win'}).text('Дякуємо за рекомендацію...').appendTo($elem.find('.like-for-book'));
                                setTimeout(function(){
                                    $elem.remove();
                                }, 3000);
                            }
                        });
                    }

                }

            }
        });
    }

    this.view = function() {
        console.log(activeOption);
    };
}
