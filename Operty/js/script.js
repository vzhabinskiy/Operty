$(".select-projects").select2({
    minimumResultsForSearch: Infinity
});

$(".select-roles").select2({
    minimumResultsForSearch: Infinity
});

var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    }
});