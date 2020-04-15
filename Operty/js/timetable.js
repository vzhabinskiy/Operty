document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        defaultView: 'dayGridMonth',
        defaultView: 'timeGridWeek',
        selectable: true,
        // editable: true,
        allDaySlot: false,
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          events: '../php/select_event.php',
          buttonText: {
              today: 'СЕГОДНЯ',
              month: 'МЕСЯЦ',
              week: 'НЕДЕЛЯ',
              day: 'ДЕНЬ'
          },
          locale: 'ru',
        select: function(info) {
            $('.popup-with-add-form').magnificPopup('open');
            $('.add-event-popup #start').val(info.start.toLocaleString());
            $('.add-event-popup #end').val(info.end.toLocaleString());
        },
        eventClick: function(info) {
            $("#button-delete").attr("href", "../php/delete_event.php?id=" + info.event.id);
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
    });

    calendar.render();
});

// отправка запроса на бэк с данными формы на создание события 
$(document).ready(function () {
    $("#add-event-form").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method:"POST",
            url: "../php/insert_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(retorn) {
                if (retorn ['sit']) {
                    // $("#msg-reg").html(retorn ['msg']);
                    location.reload();
                    // calendar.fullCalendar('refetchEvents');
                } else {
                    $("#msg-reg").html(retorn ['msg']);
                }

            }
        })
    });
    $('.button-edit').on("click", function() {
        $('.event-detail').toggle();
        $('.edit-form').toggle();
    });

    $('.button-cancel').on("click", function() {
        $('.edit-form').toggle();
        $('.event-detail').toggle();
    });
// отправка запроса на бэк с данными формы на редактирование события
    $("#edit-event-form").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method:"POST",
            url: "../php/update_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(ret) {
                if (ret ['sit']) {
                    // $("#msg-reg").html(retorn ['msg']);
                    location.reload();
                    // calendar.fullCalendar('refetchEvents');
                } else {
                    $("#msg-edit").html(ret ['msg']);
                }

            }
        })
    });
});

// подключение поп-апа для создания события
$(document).ready(function() {
	$('.popup-with-add-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
});
// подключение поп-апа для деталей события
$(document).ready(function() {
	$('.popup-with-details').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
});

$(document).ready(function(){
    $('body').on('click', '#button-close', function(){
      $('#success-close').hide();
    });
  });



