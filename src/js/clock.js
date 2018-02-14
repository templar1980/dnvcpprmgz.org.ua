var schedules;
jQuery(document).ready(function($) {

    // add animate for header pages
    setTimeout(function(){
         $('.content h1').addClass('fadeInRight animated');
    },50);
   


    //start clock
    clock(true);

    //set visibility lesson bar 
    if (localStorage.visibleLessonBar) {
        $('#name-event').addClass('show');
    } else {
        $('#name-event').addClass('hide');
    };

    //set lesson bar events
    $('.hidden-lesson').on('click', function(event) {
        event.preventDefault();
        $elem = $('#name-event');
        if ($elem.is(":hidden")) {
            $elem.show(400, function() {
                $(this).css('opacity', '1');
                localStorage.visibleLessonBar = true;
            });
        } else {
            $elem.css('opacity', '0');
            setTimeout(function() {
                $elem.hide(400);
            }, 200);
            localStorage.visibleLessonBar = '';
        };
    });
    $(window).scroll(function(event) {
        var $elem = $('.hidden-lesson');
        if ($(this).scrollTop() >= 190) {
            $elem.addClass('fixed-pos').css('left', $('.main-wrapper').offset().left);
        } else {
            $elem.removeClass('fixed-pos').css('left', 0);
        };
    });
});

function clock(isWinterTime) {
    var isWinterTime = isWinterTime;
    var $date = $('#date');
    var $time = $('#time');
    var $hdate = $('#date div:first-child');
    var $hday = $('#date div:last-child');
    var $hhour = $('#time span:first-child');
    var $hminute = $('#time span:nth-child(3)');
    var $hsecond = $('#time span:nth-child(4)');

    function getDateFromServer() {
        $.ajax({
            url: "/app/controllers/resourse/date.php",
            success: function(str) {
                changeDate(str);
            }
        });
    };

    function changeDate(str) {
        // for IE 11-
        var dateArr = str.split(',');
        var date = new Date(dateArr[0], dateArr[1] - 1, dateArr[2], dateArr[3], dateArr[4], dateArr[5]);
        if (isWinterTime) {
            date.setHours(date.getHours() - 1);
        };

        schedules = new ScheduleInfo();
        schedules.init(date);

        insertDateToHTML(date);
        $('#time span:nth-child(2)').addClass('animate-seconds');

        setInterval(function() {
            date.setSeconds(date.getSeconds() + 1);
            schedules.setDate(date);
            insertDateToHTML(date);
        }, 1000);
    };

    function insertDateToHTML(date) {
        // var arrDaysUA = ['неділя', 'понеділок', 'вівторок', 'середа', 'четверг', 'п\'ятниця', 'субота'];
        // var arrMonthUA = ['січня', 'лютого', 'березня', 'квітня', 'травня', 'червня', 'липня', 'серпня', 'вересня', 'жовтня', 'листопада', 'грудня'];
        var strDate = date.toLocaleString("uk-UA", { day: 'numeric', month: 'long' }) + ' ' + date.getFullYear();

        $hdate.text(strDate);
        $hday.text(date.toLocaleString("uk-UA", { weekday: 'long' }));

        $hhour.text(checkValue(date.getHours()));
        $hminute.text(checkValue(date.getMinutes()));
        $hsecond.text(checkValue(date.getSeconds()));
    };

    function checkValue(value) {
        return value < 10 ? '0' + value : value;
    };
    getDateFromServer();
}

function ScheduleInfo() {
    var present, timeLines, dayWeek, arrSchedule;

    this.init = function(date) {
        var self = this;
        $.ajax({
                url: '/files/json/schedule.json',
                dataType: 'json',
            })
            .done(function(obj) {
                arrSchedule = obj;
                self.setDate(date);
            });



    };

    this.setDate = function(date) {
        present = date;
        dayWeek = present.getDay();
        this.getTimeLines();
        this.getLesson();
    };

    this.getTimeLines = function() {
        if (dayWeek > 0 && dayWeek <= 5) {
            timeLines = dayWeek == 5 ? arrSchedule[1] : arrSchedule[0];
        } else {
            timeLines = dayWeek == 6 ? arrSchedule[2] : arrSchedule[3];
        };
    };

    this.getLesson = function() {
        var arrTime, beginDate, endDate;

        if (!timeLines.length) return false;

        for (var i = 0; i < timeLines.length; i++) {

            arrTime = (timeLines[i].start).split(':');
            beginDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), arrTime[0], arrTime[1], arrTime[2]);
            arrTime = (timeLines[i].end).split(':');
            endDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), arrTime[0], arrTime[1], arrTime[2]);

            if (present >= beginDate && present <= endDate) {
                this.changeIcons(timeLines[i].className);
                if (timeLines[i].needTime) {
                    this.changeTxtTime(timeLines[i], endDate);
                } else {
                    this.changeTxt(timeLines[i].text);
                };

                break;
            };
        }
    };

    this.time = function(endDate) {
        var min = Math.floor(((endDate - present) / (1000 * 60)) % 60);
        var sec = Math.floor(((endDate - present) / (1000)) % 60);
        return getStrTime(min) + ':' + getStrTime(sec);
    }

    this.changeIcons = function(nameOfClass) {
        $('#icons-event').find('i').removeAttr('class').addClass(nameOfClass);
    };

    this.changeTxt = function(name) {
        $('#name-event').html(name);
    };

    this.changeTxtTime = function(element, endDate) {
        $('#name-event').html(element.text + '<span>' + element.name + '</span>' + ' до закінчення ' + '<span>' + this.time(endDate) + '</span>');
    };

    return this;
}


