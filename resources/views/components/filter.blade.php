<div class="filter">
    <div class="filter__header">
        <div class="filter__title text-main-green">Filters</div>
        <div class="filter__icon">
            <img onclick="toggleElements('filter__main','filter__submit', 'filterDataArrow');" id="filterDataArrow"
                class="close__arrow w-4" src="{{ URL::asset('assets/svg/arrow-dd.svg') }}" alt="✖" />
        </div>
        @if (isset($subcat))
            <a href="{{ route('filter', array_merge(['subcat' => $subcat], request()->only('search'))) }}" class="filter__reset">Reset</a>
        @else
            <a href="{{ route('filter',request()->only('search')) }}" class="filter__reset">Reset</a>
        @endif
    </div>

    <div class="filter__main filter__hidden__div" id="filter__main">
        <div class="filter__container-option">
            <div class="filter__option__title">Price</div>
            <div class="filter__option">
                <label for="min-price" class="option-label"></label>
                <div class="option-input-container">
                    <input id="min-price" name="min_price"
                        class="filter__option-input @error('min_price') error @enderror "
                        value="{{ old('min_price', $data['min_price'] ?? '') }}" placeholder="Min" />
                    <span class="currency-symbol">€</span>
                </div>

                <span class="dash">-</span>

                <label for="max-price" class=".option-label"></label>
                <div class="option-input-container">
                    <input id="max-price" name="max_price"
                        class="filter__option-input @error('max_price') error @enderror"
                        value="{{ old('max_price', $data['max_price'] ?? '') }}" placeholder="Max" />
                    <span class="currency-symbol">€</span>
                </div>
            </div>
        </div>

        <div class="filter__option">
            <div class="slider-container">
                <div id="price-slider"></div>
            </div>
        </div>

        <!-- Width -->
        <div class="filter__container-option">
            <div class="filter__option__title">Width</div>
            <div class="filter__option">
                <label for="min-width" class=".option-label"></label>
                <div class="option-input-container">
                    <input id="min-width" name="min_width"
                        class="filter__option-input @error('min_width') error @enderror "
                        value="{{ old('min_width', $data['min_width'] ?? '') }}" placeholder="Min" />
                    <span class="currency-symbol">cm</span>

                </div>

                <span class="dash">-</span>

                <label for="max-width" class="option-label"></label>
                <div class="option-input-container">
                    <input id="max-width" name="max_width"
                        class="filter__option-input @error('max_width') error @enderror"
                        value="{{ old('max_width', $data['max_width'] ?? '') }}" placeholder="Max" />
                    <span class="currency-symbol">cm</span>
                </div>
            </div>
        </div>

        <div class="filter__option">
            <div class="slider-container">
                <div id="width-slider"></div>
            </div>
        </div>

        <!-- Height -->
        <div class="filter__container-option">
            <div class="filter__option__title">Height</div>
            <div class="filter__option">
                <label for="min-height" class="option-label"></label>
                <div class="option-input-container">
                    <input id="min-height" name="min_height"
                        class="filter__option-input @error('min_height') error @enderror "
                        value="{{ old('min_height', $data['min_height'] ?? '') }}" placeholder="Min" />
                    <span class="currency-symbol">cm</span>

                </div>

                <span class="dash">-</span>

                <label for="max-height" class=".option-label"></label>
                <div class="option-input-container">
                    <input id="max-height" name="max_height"
                        class="filter__option-input @error('max_height') error @enderror"
                        value="{{ old('max_height', $data['max_height'] ?? '') }}" placeholder="Max" />
                    <span class="currency-symbol">cm</span>
                </div>
            </div>
        </div>

        <div class="filter__option">
            <div class="slider-container">
                <div id="height-slider"></div>
            </div>
        </div>

        <!-- Depth -->

        <div class="filter__container-option">
            <div class="filter__option__title">Depth</div>
            <div class="filter__option">
                <label for="min-depth" class=".option-label"></label>
                <div class="option-input-container">
                    <input id="min-depth" name="min_depth"
                        class="filter__option-input @error('min_depth') error @enderror "
                        value="{{ old('min_depth', $data['min_depth'] ?? '') }}" placeholder="Min" />
                    <span class="currency-symbol">cm</span>

                </div>

                <span class="dash">-</span>

                <label for="max-depth" class=".option-label"></label>
                <div class="option-input-container">
                    <input id="max-depth" name="max_depth"
                        class="filter__option-input @error('max_depth') error @enderror"
                        value="{{ old('max_depth', $data['max_depth'] ?? '') }}" placeholder="Max" />
                    <span class="currency-symbol">cm</span>
                </div>
            </div>
        </div>

        <div class="filter__option">
            <div class="slider-container">
                <div id="depth-slider"></div>
            </div>
        </div>

        {{-- colors --}}
        <div class="filter__container-option">
            <div class="filter__option__title">Color</div>
            <div class="color-container flex gap-4">
                @foreach ($colors as $index => $color)
                    <label>
                        <input id={{ $index }} type="checkbox" name='colors[]' class="color-input pl-3"
                            value="{{ $color->id }}"
                            {{ in_array($color->id, old('colors', $data['colors'] ?? [])) ? 'checked' : '' }} />
                        <div id={{ $index }} style="background-color: {{ $color->hex }}"
                            class="color relative w-8 h-8 rounded-full cursor-pointer outline-offset-4 {{ $color->hex === '#ffffff' ? 'border border-black' : '' }}">
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- availability --}}
        <div class="filter__container-option">
            <div class="filter__option__checkbox">
                <div class="checkbox-container">
                    <div class="checkbox-wrapper">
                        <input id="is-available" name="is_available" type="checkbox" class="styled-checkbox"
                            {{ isset($data['is_available']) && $data['is_available'] ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="filter__option__title">Is available</div>
            </div>
        </div>

        {{-- discount --}}
        <div class="filter__container-option">
            <div class="filter__option__checkbox">
                <div class="checkbox-container">
                    <div class="checkbox-wrapper">
                        <input id="is-discount" name="is_discount" type="checkbox" class="styled-checkbox"
                            {{ isset($data['is_discount']) && $data['is_discount'] ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="filter__option__title">Discounted</div>
            </div>
        </div>

        {{-- free delivery --}}
        <div class="filter__container-option">
            <div class="filter__option__checkbox">
                <div class="checkbox-container">
                    <div class="checkbox-wrapper">
                        <input id="free-delivery" name="free_delivery" type="checkbox" class="styled-checkbox"
                            {{ isset($data['free_delivery']) && $data['free_delivery'] ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="filter__option__title">Free delivery</div>
            </div>
        </div>
    </div>

    {{-- submit --}}
    <div class="div-button-container">
        <button id="filter__submit" type="submit" class="div-button filter__hidden__div"
            onClick="submitFilters();">
            Search
        </button>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="{{ URL::asset('js/filter.js') }}" defer></script>
    <script src="{{ URL::asset('js/filter_linker.js') }}" defer></script>
@endpush
