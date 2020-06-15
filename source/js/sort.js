// фильтрация проектов
$(".select-projects").change(function () {
  let type = $(".select-projects option:selected").data("sort");
  $(".card_project").each(function () {
    if (type == "Все" || type == $(this).data("cat")) {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
});
//фильтрация участников
$(".select-participants").change(function () {
  let type = $(".select-participants option:selected").data("prof");
  $(".card_person").each(function () {
    if (type == "Все" || type == $(this).data("part")) {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
});
//фильтрация исполнителей
$(".select-executors").change(function () {
  let type = $(".select-executors option:selected").data("proff");
  $(".card_executor").each(function () {
    if (type == "Все" || type == $(this).data("executor")) {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
});