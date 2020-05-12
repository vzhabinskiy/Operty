// инициализация плагина по стилизации input с type file
$(function() {
    $(".input-file").fileinput('<button class="button__add-picture">Выбрать картинку</button>');
});

// загрузка фото при создании нового проекта
document.getElementById('input-file').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        let reader = new FileReader();
          reader.onload = function (e) {
          document.getElementById('image-project').setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    }
});
