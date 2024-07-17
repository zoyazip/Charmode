const submitBtn = document.getElementById("filter__submit");

// Price
const minPriceInput = document.getElementById("min-price");
const maxPriceInput = document.getElementById("max-price");

const priceSlider = document.getElementById("price-slider");
console.log("min: ", minPriceInput.value);
if (maxPriceInput.value == 0) {
    maxPriceInput.value = 999;
    // submitBtn.click();
}
noUiSlider.create(priceSlider, {
    start: [minPriceInput.value, maxPriceInput.value], // Initial values
    connect: true,
    range: {
        min: 0,
        max: 999,
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

// Width

const minWidthInput = document.getElementById("min-width");
const maxWidthInput = document.getElementById("max-width");

const widthSlider = document.getElementById("width-slider");
console.log("min: ", minWidthInput.value);
if (maxWidthInput.value == 0) {
    maxWidthInput.value = 999;
    // submitBtn.click();
}
noUiSlider.create(widthSlider, {
    start: [minWidthInput.value, maxWidthInput.value], // Initial values
    connect: true,
    range: {
        min: 0,
        max: 999,
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

widthSlider.noUiSlider.on("update", function (values, handle) {
    if (handle === 0) {
        minWidthInput.value = Math.round(values[0]);
    } else {
        maxWidthInput.value = Math.round(values[1]);
    }
});

minWidthInput.addEventListener("change", function () {
    widthSlider.noUiSlider.set([Math.round(this.value), null]);
});

maxWidthInput.addEventListener("change", function () {
    widthSlider.noUiSlider.set([null, Math.round(this.value)]);
});

// Height

const minHeightInput = document.getElementById("min-height");
const maxHeightInput = document.getElementById("max-height");

const heightSlider = document.getElementById("height-slider");
console.log("min: ", minHeightInput.value);
if (maxHeightInput.value == 0) {
    maxHeightInput.value = 999;
    // submitBtn.click();
}
noUiSlider.create(heightSlider, {
    start: [minHeightInput.value, maxHeightInput.value], // Initial values
    connect: true,
    range: {
        min: 0,
        max: 999,
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

heightSlider.noUiSlider.on("update", function (values, handle) {
    if (handle === 0) {
        minHeightInput.value = Math.round(values[0]);
    } else {
        maxHeightInput.value = Math.round(values[1]);
    }
});

minHeightInput.addEventListener("change", function () {
    heightSlider.noUiSlider.set([Math.round(this.value), null]);
});

maxHeightInput.addEventListener("change", function () {
    heightSlider.noUiSlider.set([null, Math.round(this.value)]);
});

// Depth

const minDepthInput = document.getElementById("min-depth");
const maxDepthInput = document.getElementById("max-depth");

const depthSlider = document.getElementById("depth-slider");
console.log("min: ", minDepthInput.value);
if (maxDepthInput.value == 0) {
    maxDepthInput.value = 999;
    // submitBtn.click();
}
noUiSlider.create(depthSlider, {
    start: [minDepthInput.value, maxDepthInput.value], // Initial values
    connect: true,
    range: {
        min: 0,
        max: 999,
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

depthSlider.noUiSlider.on("update", function (values, handle) {
    if (handle === 0) {
        minDepthInput.value = Math.round(values[0]);
    } else {
        maxDepthInput.value = Math.round(values[1]);
    }
});

minDepthInput.addEventListener("change", function () {
    depthSlider.noUiSlider.set([Math.round(this.value), null]);
});

maxDepthInput.addEventListener("change", function () {
    depthSlider.noUiSlider.set([null, Math.round(this.value)]);
});

function toggleElements(divId, divId2, arrowId) {
    const div = document.getElementById(divId);
    const div2 = document.getElementById(divId2);
    const arrow = document.getElementById(arrowId);
    if (arrow.classList.contains("close__arrow")) {
        arrow.classList.remove("close__arrow");
        arrow.classList.add("open__arrow");
        div.classList.remove("filter__hidden__div");
        div.classList.add("filter__visible__div");
        div2.classList.remove("filter__hidden__div");
        div2.classList.add("filter__visible__div");
    } else {
        arrow.classList.remove("open__arrow");
        arrow.classList.add("close__arrow");
        div.classList.add("filter__hidden__div");
        div.classList.remove("filter__visible__div");
        div2.classList.add("filter__hidden__div");
        div2.classList.remove("filter__visible__div");
    }
}
