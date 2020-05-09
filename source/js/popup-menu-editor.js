$(function() {
    var popover = $('.editor-popper-js');
    // var popover1 = $('.toggle-night');
    popover.hide();
    $('.editor-popper-button_dots').on('click', function(e) {
      var target = $(e.target);
      // if(target.is(popover)) return;
      // if(target.is(popover1)) return;
      // e.preventDefault();
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
    //   var reference = $('.editor-popper-button_dots');
    //   var popover = $('.popper-js');
    //   var popover1 = $('.toggle-night');
    //   popover.hide();
    
    //   $(document).on('click touchend', function(e) {
    //     var target = $(e.target);
    //     if(target.is(popover)) return;
    //     if(target.is(popover1)) return;
    //     if (target.is(reference)) {
    //       e.preventDefault();
    
    //       popover.show();
    //       reference.addClass('active')
    
    //       var popper = new Popper(target, popover, {
    //         placement: 'bottom',
    //       });
          
    //     }
    //     else {
    //       popover.hide();
    //       reference.removeClass('active');
    //     }
    //   });
    
    // });

   



//   $(document).mouseup(function (e) {
//     var container = $(".popper-js");
//     if (container.has(e.target).length === 0){
//         container.hide();
//         $('.editor-popper-button_dots').removeСlass('active')

//     }
// });