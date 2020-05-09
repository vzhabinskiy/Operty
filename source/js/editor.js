tinymce.init({
    selector: '#text',
    // skin: 'oxide-dark',
    // content_css: 'dark',
    statusbar: false,
    language: "ru",
    width: 700,
    min_height: 500,
    plugins: "autoresize",
  });
  
  $(document).ready(function () {
    $("#add-script").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method:"POST",
            url: "../../php/engine/editor_insert.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(retorn) {
                if (retorn ['sit']) {
                    location.reload();
                } else {
                    $("#msg-reg").html(retorn ['msg']);
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

