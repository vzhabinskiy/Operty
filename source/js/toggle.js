$(document).ready(function () {
    let manual__item = $('.manual__item');
    manual__item.click(function (e) {
        if (!$('.manual__icon').hasClass('active')) {
            $(e.currentTarget).find('.manual__icon').addClass('active');
        } else {
            $(e.currentTarget).find('.manual__icon').removeClass('active');
        }
    })
});