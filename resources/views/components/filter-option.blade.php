{{-- <div class="filter__container-option">
    <div class="filter__option__title">{{ $title }}</div>
    <div class="filter__option">
        <label for="min-{{ $title }}" class="option-label"></label>
        <div class="option-input-container">
            <input id="min-{{ $title }}" name="{{ $minName }}"
                class="filter__option-input @error($minName) error @enderror"
                value="{{ old($minName, $minValue) }}" placeholder="{{ $placeholderMin }}" />
            <span class="currency-symbol">{{ $symbol }}</span>
        </div>

        <span class="dash">-</span>

        <label for="max-{{ $title }}" class="option-label"></label>
        <div class="option-input-container">
            <input id="max-{{ $title }}" name="{{ $maxName }}"
                class="filter__option-input @error($maxName) error @enderror"
                value="{{ old($maxName, $maxValue) }}" placeholder="{{ $placeholderMax }}" />
            <span class="currency-symbol">{{ $symbol }}</span>
        </div>
    </div>
    <div class="filter__option">
        <div class="slider-container">
            <div id="{{ strtolower($title) }}-slider"></div>
        </div>
    </div>
</div> --}}
