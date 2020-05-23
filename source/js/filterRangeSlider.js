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