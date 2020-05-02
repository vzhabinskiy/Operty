$(".select-projects").select2({
    minimumResultsForSearch: Infinity
});

$(".select-roles").select2({
    minimumResultsForSearch: Infinity
});

$(".select-region").select2({
    minimumResultsForSearch: Infinity
});
$(".select-executors").select2({
    minimumResultsForSearch: Infinity
});
$(".select-responsible-add").select2({
    minimumResultsForSearch: Infinity
});
$(".select-responsible-edit").select2({
    minimumResultsForSearch: Infinity
});
let slider = document.getElementById("range-slider");
    noUiSlider.create(slider, {
        start: [9, 65],
        connect: true,
        step: 1,
        range: {
            'min': 9,
            'max': 65
        },
    format: wNumb({
            decimals: 0,
            thousand: ' ',
        })
    });
let SliderValues = [
        document.getElementById('start'),
        document.getElementById('end')
    ];
    slider.noUiSlider.on('update', function(values, handle) {
        SliderValues[handle].innerHTML = values[handle];
    });