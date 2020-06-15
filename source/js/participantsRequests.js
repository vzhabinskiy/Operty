$(document).ready(function () {
    $("#insert-participant").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/insert_participants.php",
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