function submitFilters() {
    const minPriceInput = document.getElementById('min-price');
    const minPriceForm = document.getElementById('min_price_form');
    minPriceForm.value = minPriceInput.value;
    const maxPriceInput = document.getElementById('max-price');
    const maxPriceForm = document.getElementById('max_price_form');
    maxPriceForm.value = maxPriceInput.value;

    const minWidthInput = document.getElementById('min-width');
    const minWidthForm = document.getElementById('min_width_form');
    minWidthForm.value = minWidthInput.value;

    const maxWidthInput = document.getElementById('max-width');
    const maxWidthForm = document.getElementById('max_width_form');
    maxWidthForm.value = maxWidthInput.value;

    const minHeightInput = document.getElementById('min-height');
    const minHeightForm = document.getElementById('min_height_form');
    minHeightForm.value = minHeightInput.value;

    const maxHeightInput = document.getElementById('max-height');
    const maxHeightForm = document.getElementById('max_height_form');
    maxHeightForm.value = maxHeightInput.value;

    const minDepthInput = document.getElementById('min-depth');
    const minDepthForm = document.getElementById('min_depth_form');
    minDepthForm.value = minDepthInput.value;

    const maxDepthInput = document.getElementById('max-depth');
    const maxDepthForm = document.getElementById('max_depth_form');
    maxDepthForm.value = maxDepthInput.value;

    const colorCheckboxes = document.querySelectorAll('input[name="colors[]"]');
    const colorsForm = document.getElementById('colors_form');
    const selectedColors = [];
    colorCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedColors.push(checkbox.value);
        }
    });
    colorsForm.value = selectedColors.join(',');

    const isAvailableInput = document.getElementById('is-available');
    const isAvailableForm = document.getElementById('is_available_form');
    isAvailableForm.value = isAvailableInput.checked ? 'on' : '';

    const isDiscountInput = document.getElementById('is-discount');
    const isDiscountForm = document.getElementById('is_discount_form');
    isDiscountForm.value = isDiscountInput.checked ? 'on' : '';

    const freeDeliveryInput = document.getElementById('free-delivery');
    const freeDeliveryForm = document.getElementById('free_delivery_form');
    freeDeliveryForm.value = freeDeliveryInput.checked ? 'on' : '';


    document.getElementById('search-form').submit();
}