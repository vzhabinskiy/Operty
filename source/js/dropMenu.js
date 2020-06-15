// выпадающее меню в редакторе
$(function () {
  var popover = $('.editor-popper-js');
  popover.hide();
  $('.editor-popper-button_dots').on('click', function (e) {
    let target = $(e.target);
    if (!$(this).hasClass('active')) {
      $(this).addClass('active');
      popover.show();
      let popper = new Popper(target, popover, {
        placement: 'bottom',
      });
    } else {
      $(this).removeClass('active');
      popover.hide();
    }
  });
});