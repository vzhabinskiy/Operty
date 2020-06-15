$(document).ready(function () {
    $("#insert-script").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/insert_script.php",
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
$(document).ready(function () {
    $("#update-script").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/update_script.php",
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
$(document).ready(function () {
    $("#update-script-mob").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/update_script.php",
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