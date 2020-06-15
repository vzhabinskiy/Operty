document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');

    let params = {
        plugins: ['interaction', 'dayGrid', 'timeGrid'],
        defaultView: 'dayGridMonth',
        defaultView: 'timeGridWeek',
        selectable: calendarEl.dataset.selectable == 'false' ? false : true,
        allDaySlot: false,
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: '../../php/engine/select_event.php',
        buttonText: {
            today: 'СЕГОДНЯ',
            month: 'МЕСЯЦ',
            week: 'НЕДЕЛЯ',
            day: 'ДЕНЬ'
        },
        locale: 'ru',
        validRange: function (nowDate) {
            return { start: nowDate }
        },
        select: function (info) {
            $('.popup-with-add-form').magnificPopup('open');
            $('.add-event-popup #start').val(info.start.toLocaleString());
            $('.add-event-popup #end').val(info.end.toLocaleString());
        },
        eventClick: function (info) {
            $("#button-delete").attr("href", "../../php/engine/delete_event.php?id=" + info.event.id);
            info.jsEvent.preventDefault();
            console.log(info.event);
            $('.popup-with-details').magnificPopup('open');
            $('.details-popup #id').text(info.event.id);
            $('.details-popup #id').val(info.event.id);
            $('.details-popup #title').text(info.event.title);
            $('.details-popup #title').val(info.event.title);
            $('.details-popup #description').text(info.event.extendedProps.description);
            $('.details-popup #description').val(info.event.extendedProps.description);
            // $('.popup1 #responsible').text(info.event.extendedProps.responsible);
            $('.details-popup #responsible').val(info.event.extendedProps.responsible);
            $('.details-popup #place').text(info.event.extendedProps.place);
            $('.details-popup #place').val(info.event.extendedProps.place);
            $('.details-popup #start').text(info.event.start.toLocaleString());
            $('.details-popup #start').val(info.event.start.toLocaleString());
            $('.details-popup #end').text(info.event.end.toLocaleString());
            $('.details-popup #end').val(info.event.end.toLocaleString());
        }
    };

    let calendar = new FullCalendar.Calendar(calendarEl, params);
    calendar.render();
});

// отправка запроса на бэк с данными формы на создание события 
$(document).ready(function () {
    $("#add-event-form").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/insert_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                if (response['db']) {
                    location.reload();
                } else {
                    $("#msg-reg").html(response['msg']);
                }

            }
        })
    });
    $('.button-edit').on("click", function () {
        $('.event-detail').toggle();
        $('.edit-form').toggle();
    });

    $('.button-cancel').on("click", function () {
        $('.edit-form').toggle();
        $('.event-detail').toggle();
    });
    // отправка запроса на бэк с данными формы на редактирование события
    $("#edit-event-form").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/update_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                if (response['db']) {
                    location.reload();
                } else {
                    $("#msg-edit").html(response['msg']);
                }
            }
        })
    });
});

// подключение поп-апа для создания события
$(document).ready(function () {
    $('.popup-with-add-form').magnificPopup({
    });
});
// подключение поп-апа для деталей события
$(document).ready(function () {
    $('.popup-with-details').magnificPopup({
    });
});



