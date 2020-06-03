// инициализация tinymce
tinymce.init({
    selector: '#text',
    statusbar: false,
    language: "ru",
    width: 700,
    min_height: 500,
    plugins: "autoresize",
  });

// отправка запроса бэк с данными редактора
  $(document).ready(function () {
    $("#add-script").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method:"POST",
            url: "../../php/engine/editor_insert.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                if (response ['db']) {
                    location.reload();
                } else {
                    $("#msg-reg").html(response ['msg']);
                }

            }
        })
    });
});


$(document).ready(function(){
  $('body').on('click', '#button-close', function(){
    $('#success-close').hide();
  });
});

