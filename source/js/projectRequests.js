$(document).ready(function () {
    $("#insert-project").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/insert_project.php",
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
    $("#edit-project").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/update_project.php",
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
    $("#edit-project-mob").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../php/engine/update_project.php",
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

