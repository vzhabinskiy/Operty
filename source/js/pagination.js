$(document).ready(function () {
    $('.sidebar-series__list a').each(function () {
        if ('http://operty/php/views/' + $(this).attr('href') == window.location.href) {
            $(this).addClass('sidebar-series__item-selected');
        }
    });
});