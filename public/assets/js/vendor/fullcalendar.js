(function () {
    "use strict";
    //Calendar Events Initializations

    // sample calendar events data
    var curYear = moment().format('YYYY');
    var curMonth = moment().format('MM');

    // Calendar Event Source
    var bdCalendarEvents = {
        id: 1,
        events: [{
            id: '1',
            start: curYear + '-' + curMonth + '-02',
            end: curYear + '-' + curMonth + '-03',
            title: 'Australia Tech Conference',
            className: "bg-secondary-transparent",
            description: 'Tech experts across Australia meet and collaborate.'
        }, {
            id: '2',
            start: curYear + '-' + curMonth + '-17',
            end: curYear + '-' + curMonth + '-17',
            title: 'USA Design Review',
            className: "bg-info-transparent",
            description: 'Review of upcoming design systems in the US market.'
        }, {
            id: '3',
            start: curYear + '-' + curMonth + '-13',
            end: curYear + '-' + curMonth + '-13',
            title: 'China Lifestyle Expo',
            className: "bg-primary-transparent",
            description: 'A showcase of lifestyle innovations in China.'
        }, {
            id: '4',
            start: curYear + '-' + curMonth + '-21',
            end: curYear + '-' + curMonth + '-21',
            title: 'Australia Team Briefing',
            className: "bg-warning-transparent",
            description: 'Weekly strategy meeting for the Australian team.'
        }, {
            id: '5',
            start: curYear + '-' + curMonth + '-04T10:00:00',
            end: curYear + '-' + curMonth + '-06T15:00:00',
            title: 'USA Music Carnival',
            className: "bg-success-transparent",
            description: 'Live performances and music culture celebration in the USA.'
        }, {
            id: '6',
            start: curYear + '-' + curMonth + '-23T13:00:00',
            end: curYear + '-' + curMonth + '-25T18:30:00',
            title: 'China Traditional Wedding',
            className: "bg-success-transparent",
            description: 'Attend a traditional wedding celebration in China.'
        }]
    };

    // Birthday Events Source
    var bdBirthdayEvents = {
        id: 2,
        className: "bg-info-transparent",
        textColor: '#fff',
        events: [{
            id: '7',
            start: curYear + '-' + curMonth + '-04',
            end: curYear + '-' + curMonth + '-04',
            title: 'Liam’s Birthday (Australia)',
            description: 'Celebrating Liam’s special day in Sydney.'
        }, {
            id: '8',
            start: curYear + '-' + curMonth + '-28',
            end: curYear + '-' + curMonth + '-28',
            title: 'Emily’s Birthday (USA)',
            description: 'Celebration party in New York.'
        }, {
            id: '9',
            start: curYear + '-' + curMonth + '-31',
            end: curYear + '-' + curMonth + '-31',
            title: 'Wei Chen’s Birthday (China)',
            description: 'Birthday celebration in Beijing.'
        }, {
            id: '10',
            start: curYear + '-' + 11 + '-11',
            end: curYear + '-' + 11 + '-11',
            title: 'Xiaoming’s Birthday (China)',
            description: 'Traditional birthday gathering.'
        }]
    };

    // Holiday Events Source
    var bdHolidayEvents = {
        id: 3,
        className: "bg-danger-transparent",
        textColor: '#fff',
        events: [{
            id: '10',
            start: curYear + '-' + curMonth + '-05',
            end: curYear + '-' + curMonth + '-08',
            title: 'Australia Festival Days'
        }, {
            id: '11',
            start: curYear + '-' + curMonth + '-18',
            end: curYear + '-' + curMonth + '-19',
            title: 'USA Memorial Observance'
        }, {
            id: '12',
            start: curYear + '-' + curMonth + '-25',
            end: curYear + '-' + curMonth + '-26',
            title: 'China Diwali Celebration'
        }]
    };

    // Other Events Source
    var bdOtherEvents = {
        id: 4,
        className: "bg-info-transparent",
        textColor: '#fff',
        events: [{
            id: '13',
            start: curYear + '-' + curMonth + '-07',
            end: curYear + '-' + curMonth + '-09',
            title: 'Australia Public Rest Days'
        }, {
            id: '13',
            start: curYear + '-' + curMonth + '-29',
            end: curYear + '-' + curMonth + '-31',
            title: 'China National Break'
        }]
    };

    //FullCalendar
    var containerEl = document.getElementById('external-events');
    new FullCalendar.Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText.trim(),
                title: eventEl.innerText,
                className: eventEl.className + ' overflow-hidden '
            }
        }
    });
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'month',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        selectMirror: true,
        droppable: true, // this allows things to be dropped onto the calendar

        select: function (arg) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
        },
        eventClick: function (arg) {
            if (confirm('Are you sure you want to delete this event?')) {
                arg.event.remove()
            }
        },

        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        eventSources: [bdCalendarEvents, bdBirthdayEvents, bdHolidayEvents, bdOtherEvents,],

    });
    calendar.render();
})();
