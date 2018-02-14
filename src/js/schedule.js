var arrSchedule = [
    [{
            start: '08:15:00',
            end: '08:59:59',
            name: '1 урок',
        },
        {
            start: '09:00:00',
            end: '09:09:59',
            name: 'перерва',
        },
        {
            start: '09:10:00',
            end: '09:54:59',
            name: '2 урок',
        },
        {
            start: '09:55:00',
            end: '10:04:59',
            name: 'перерва',
        },
        {
            start: '10:05:00',
            end: '10:49:59',
            name: '3 урок',
        },
        {
            start: '10:50:00',
            end: '10:59:59',
            name: 'перерва',
        },
        {
            start: '11:00:00',
            end: '11:44:59',
            name: '4 урок',
        },
        {
            start: '11:45:00',
            end: '11:54:59',
            name: 'перерва',
        },
        {
            start: '11:55:00',
            end: '12:39:59',
            name: '5 урок',
        },
        {
            start: '12:40:00',
            end: '13:09:59',
            name: 'Обід',
        },
        {
            start: '13:10:00',
            end: '13:54:59',
            name: '6 урок',
        },
        {
            start: '13:55:00',
            end: '14:04:59',
            name: 'перерва',
        },
        {
            start: '14:05:00',
            end: '14:49:59',
            name: '7 урок',
        },
        {
            start: '14:50:00',
            end: '14:59:59',
            name: 'перерва',
        },
        {
            start: '15:00:00',
            end: '15:44:59',
            name: '8 урок',
        }
    ],
    [{
            start: '08:00:00',
            end: '08:29:59',
            name: 'Класна година',
        },
        {
            start: '08:30:00',
            end: '08:39:59',
            name: 'перерва',
        },
        {
            start: '08:40:00',
            end: '09:24:59',
            name: '1 урок',
        },
        {
            start: '09:25:00',
            end: '09:29:59',
            name: 'перерва',
        },
        {
            start: '09:30:00',
            end: '10:14:59',
            name: '2 урок',
        },
        {
            start: '10:15:00',
            end: '10:24:59',
            name: 'перерва',
        },
        {
            start: '10:25:00',
            end: '11:09:59',
            name: '3 урок',
        },
        {
            start: '11:10:00',
            end: '11:19:59',
            name: 'перерва',
        },
        {
            start: '11:20:00',
            end: '12:04:59',
            name: '4 урок',
        },
        {
            start: '12:05:00',
            end: '12:09:59',
            name: 'перерва',
        },
        {
            start: '12:10:00',
            end: '12:54:59',
            name: '5 урок',
        },
        {
            start: '12:55:00',
            end: '13:24:59',
            name: 'Обід',
        },
        {
            start: '13:25:00',
            end: '14:09:59',
            name: '6 урок',
        },
        {
            start: '14:10:00',
            end: '14:19:59',
            name: 'перерва',
        },
        {
            start: '14:20:00',
            end: '15:04:59',
            name: '7 урок',
        },
        {
            start: '15:05:00',
            end: '15:09:59',
            name: 'перерва',
        },
        {
            start: '15:10:00',
            end: '15:54:59',
            name: '8 урок',
        }
    ]
]

jQuery(document).ready(function($) {});

function ScheduleInfo() {
    var present, timeLines, dayWeek;

    this.setDate = function(date) {
        present = date;
        dayWeek = present.getDay();
        this.getTimeLines();
        this.getLesson();
    };
    this.getTimeLines = function() {
        if (dayWeek > 0 && dayWeek <= 5) {
            timeLines = dayWeek == 4 ? arrSchedule[1] : arrSchedule[0];
        } else {
            this.setHtmlEmpty();
            timeLines = [];
        };
    };

    this.getLesson = function() {
        var arrTime, beginDate, endDate;

        if (!timeLines.length) return false;

        arrTime = (timeLines[0].start).split(':');
        beginDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), 0, 0, 0);
        endDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), arrTime[0], arrTime[1], arrTime[2]);
        if (  present >= beginDate && present < endDate) {
            $('.present').html('Уроки ще не розпочалися, початок о ' + arrTime[0] +':'+ arrTime[1] );
            return false;
        };

        arrTime = (timeLines[timeLines.length-1].end).split(':');
        beginDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), arrTime[0], arrTime[1], arrTime[2]);
        endDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), 23,59,59);
        
         if (present > beginDate && present <= endDate) {
            $('.present').html('На сьогодні уроки закінчилися...');
            return false;
        };

        for (var i = 0; i < timeLines.length; i++) {
            arrTime = (timeLines[i].start).split(':');
            beginDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), arrTime[0], arrTime[1], arrTime[2]);
            arrTime = (timeLines[i].end).split(':');
            endDate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), arrTime[0], arrTime[1], arrTime[2]);
            if (present >= beginDate && present <= endDate) {
                this.setHtml(timeLines[i].name, this.time(present, endDate));
                break;
            };
        }
    };

    this.time = function(present, endDate) {
        var min = Math.floor(((endDate - present) / (1000 * 60)) % 60);
        var sec = Math.floor(((endDate - present) / (1000)) % 60);
        return getStrTime(min) + ':' + getStrTime(sec);
    }

    this.setHtml = function(name, time) {
        $('.present').html('Зараз <span>' + name + '</span>, до кінця залишилось <span>' + time + '</span>');
    };

    this.setHtmlEmpty = function() {
        $('.present').text('Сьогодні ' + present.toLocaleString("uk-UA", { weekday: 'long' }) + ' - вихідний день');
    }

    return this;
}