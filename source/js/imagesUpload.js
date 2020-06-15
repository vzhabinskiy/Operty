// инициализация плагина по стилизации input с type file
$(function () {
    $(".input-file").fileinput('<button class="button__add-picture">Выбрать картинку</button>');
});
$(function () {
    $(".input-file-mob").fileinput('<button class="button__add-picture">Выбрать картинку</button>');
});
$(function () {
    $(".input-file-profile-editor").fileinput('<button class="button__update-img">Выбрать картинку</button>');
});

// загрузка фото при создании нового проекта
$(document).ready(function () {
    document.getElementById('input-file').addEventListener('change', function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('image-project').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});
// загрузка фото при создании нового проекта при адаптиве
$(document).ready(function () {
    document.getElementById('input-file-mob').addEventListener('change', function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('image-project-mob').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});
// загрузка аватара
$(document).ready(function () {
    document.getElementById('input-file-profile-editor').addEventListener('change', function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('image-profile').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});