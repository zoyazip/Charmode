// function initializeRangeSlider(minInputId, maxInputId, sliderId) {
//     const minInput = document.getElementById(minInputId);
//     const maxInput = document.getElementById(maxInputId);
//     const rangeSlider = document.getElementById(sliderId);

//     console.log("min: ", minInput.value);

//     if (maxInput.value == 0) {
//         maxInput.value = 1000;
//     }

//     noUiSlider.create(rangeSlider, {
//         start: [minInput.value, maxInput.value], // Initial values
//         connect: true,
//         range: {
//             min: 0,
//             max: 1000,
//         },
//         tooltips: false,
//         format: {
//             to: function (value) {
//                 return Math.round(value); // Rounding the value
//             },
//             from: function (value) {
//                 return value;
//             },
//         },
//     });

//     rangeSlider.noUiSlider.on("update", function (values, handle) {
//         if (handle === 0) {
//             minInput.value = Math.round(values[0]);
//         } else {
//             maxInput.value = Math.round(values[1]);
//         }
//     });

//     minInput.addEventListener("change", function () {
//         rangeSlider.noUiSlider.set([Math.round(this.value), null]);
//     });

//     maxInput.addEventListener("change", function () {
//         rangeSlider.noUiSlider.set([null, Math.round(this.value)]);
//     });
// }
