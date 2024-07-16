{{-- <!-- resources/views/components/filter-option.blade.php -->
<div class="filter__container-option">
    <div class="filter__option__title">{{ $title }}</div>
    <div class="filter__option">
        <label for="min-input" class="option-label"></label>
        <div class="option-input-container">
            <input id="min-input" name="{{ $minName }}"
                class="filter__option-input @error($minName) error @enderror"
                value="{{ old($minName, $minValue) }}" placeholder="Min" />
            <span class="unit-symbol">{{ $symbol }}</span>
        </div>

        <span class="dash">-</span>

        <label for="max-input" class="option-label"></label>
        <div class="option-input-container">
            <input id="max-input" name="{{ $maxName }}"
                class="filter__option-input @error($maxName) error @enderror"
                value="{{ old($maxName, $maxValue) }}" placeholder="Max" />
            <span class="unit-symbol">{{ $symbol }}</span>
        </div>
    </div>
</div>
<div class="filter__option">
    <div class="slider-container">
        <div id="price-slider"></div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        initializeRangeSlider("min-price", "max-price", "price-slider");
    });
</script> --}}
