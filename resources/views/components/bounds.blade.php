<!-- resources/views/components/bounds.blade.php -->
<div class="filter__container-option">
    <div class="filter__option__title">{{ $option }}</div>
    <div class="filter__option">
        <label for="min-{{ strtolower($option) }}" class=".option-label"></label>
        <div class="option-input-container">
            <input id="min-{{ strtolower($option) }}" name="min_{{ strtolower($option) }}"
                class="filter__option-input @error('min_{{ strtolower($option) }}') error @enderror"
                value="{{ old('min_' . strtolower($option), $min) }}" placeholder="Min" />
            <span class="currency-symbol">{{ $symbol }}</span>
        </div>

        <span class="dash">-</span>

        <label for="max-{{ strtolower($option) }}" class=".option-label"></label>
        <div class="option-input-container">
            <input id="max-{{ strtolower($option) }}" name="max_{{ strtolower($option) }}"
                class="filter__option-input @error('max_{{ strtolower($option) }}') error @enderror"
                value="{{ old('max_' . strtolower($option), $max) }}" placeholder="Max" />
            <span class="currency-symbol">{{ $symbol }}</span>
        </div>
    </div>
</div>

<div class="filter__option">
    <div class="slider-container">
        <div id="{{ strtolower($option) }}-slider"></div>
    </div>
</div>
