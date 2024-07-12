const minPriceInput = document.getElementById("min-price");
const maxPriceInput = document.getElementById("max-price");
const color = document.getElementById("color");

const priceSlider = document.getElementById("price-slider");
console.log("min: ", minPriceInput.value);
if (maxPriceInput.value == 0) {
    maxPriceInput.value = 1000;
}
noUiSlider.create(priceSlider, {
    start: [minPriceInput.value, maxPriceInput.value], // Initial values
    connect: true,
    range: {
        min: 0,
        max: 1000,
    },
    tooltips: false,
    format: {
        to: function (value) {
            return Math.round(value); // Rounding the value
        },
        from: function (value) {
            return value;
        },
    },
});

priceSlider.noUiSlider.on("update", function (values, handle) {
    if (handle === 0) {
        minPriceInput.value = Math.round(values[0]);
    } else {
        maxPriceInput.value = Math.round(values[1]);
    }
});

minPriceInput.addEventListener("change", function () {
    priceSlider.noUiSlider.set([Math.round(this.value), null]);
});

maxPriceInput.addEventListener("change", function () {
    priceSlider.noUiSlider.set([null, Math.round(this.value)]);
});
