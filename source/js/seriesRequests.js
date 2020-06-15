$(document).ready(function () {
    $("#edit-series").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/update_editor_series.php",
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