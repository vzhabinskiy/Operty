// выпадающее меню в редакторе
$(function() {
    var popover = $('.editor-popper-js');
    popover.hide();
    $('.editor-popper-button_dots').on('click', function(e) {
      var target = $(e.target);
      if (!$(this).hasClass('active')) { 
        $(this).addClass('active'); 
        popover.show();
        var popper = new Popper(target, popover, {
          placement: 'bottom',
        });
      } else {
        $(this).removeClass('active'); 
        popover.hide(); 
      }
    });
  });

  // $(function() {
  //   var popover = $('.editor-popper-js');
  //   popover.hide();
  //   $('.card__menu').click(function(e) {
  //     var target = $(e.target);
  //     if (!$(this).hasClass('active')) { 
  //       $(this).addClass('active'); 
  //       popover.show();
  //       var popper = new Popper(target, popover, {
  //         placement: 'bottom',
  //       });
  //       $('div.row a').click(function(e){
  //         e.preventDefault();
  //       });
  //     } 
  //     else {
  //       $(this).removeClass('active'); 
  //       popover.hide();
  //       $("div.row a").unbind("click");
  //     }
  //   });
  // });
  