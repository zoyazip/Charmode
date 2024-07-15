// public/js/slider.js
document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll("[id$='-slider']");

    elements.forEach((slider) => {
        const option = slider.id.replace("-slider", "");
        const minInput = document.getElementById(`min-${option}`);
        const maxInput = document.getElementById(`max-${option}`);

        noUiSlider.create(slider, {
            start: [parseInt(minInput.value), parseInt(maxInput.value)],
            connect: true,
            range: {
                min: 0,
                max: 1000,
            },
            tooltips: false,
            format: {
                to: function (value) {
                    return Math.round(value);
                },
                from: function (value) {
                    return value;
                },
            },
        });

        slider.noUiSlider.on("update", function (values, handle) {
            if (handle === 0) {
                minInput.value = Math.round(values[0]);
            } else {
                maxInput.value = Math.round(values[1]);
            }
        });

        minInput.addEventListener("change", function () {
            slider.noUiSlider.set([Math.round(this.value), null]);
        });

        maxInput.addEventListener("change", function () {
            slider.noUiSlider.set([null, Math.round(this.value)]);
        });
    });
});
