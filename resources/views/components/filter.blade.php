{{-- @php
    if (!class_exists('ProductTmp')) {
        class ProductTmp
        {
            public $id;
            public $title;
            public $price;
            public $discount;
            public $old_price;
            public $expand;
            public $free_delivery;
            public $img_path;
            public $colors;
            public $product_code;
            public $rating;
            public $comments_count;

            public function __construct(
                $id,
                $title,
                $price,
                $discount,
                $old_price,
                $expand,
                $free_delivery,
                $img_path,
                $colors,
                $product_code,
                $rating,
                $comments_count,
            ) {
                $this->id = $id;
                $this->title = $title;
                $this->price = $price;
                $this->discount = $discount;
                $this->old_price = $old_price;
                $this->expand = $expand;
                $this->free_delivery = $free_delivery;
                $this->img_path = $img_path;
                $this->colors = $colors;
                $this->product_code = $product_code;
                $this->rating = $rating;
                $this->comments_count = $comments_count;
            }
        }
    }

    $product1 = new ProductTmp(
        1,
        'Krēsls Comfivo 204 (Aston 8)',
        100.0,
        10,
        110.0,
        false,
        false,
        [
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
            'assets/chair-placeholder.png',
        ],
        ['#F64141', '#2F591B', '#4289F4', '#ffffff', '#000000'],
        '2281488ZV',
        7.8,
        27,
    );
@endphp --}}

<div class="filter">
    <form action="{{ route('filter') }}" method="GET">

        <div class="filter__header">
            <div class="filter__title">Filters</div>
            <div class="filter__icon">
                <img onclick="changeDataArrow('filter__main', 'filterDataArrow')" id="filterDataArrow" class="close__arrow"
                    src="assets/svg/arrow.svg" />
            </div>
            <a href="{{ route('filter') }}" class="filter__reset">Reset</a>
        </div>

        <div class="filter__main hidden__div" id="filter__main">
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
                        {{-- <label>
                            <div class="checkbox-wrapper">
                                <label>
                                    <input type="checkbox" name="colors[]" value="{{ $color }}"
                                        class="styled-checkbox" style="background-color: {{ $color }}"
                                        {{ in_array($color, old('colors', $data['colors'] ?? [])) ? 'checked' : '' }} />
                                </label>
                            </div>
                        </label> --}}
                        <label>
                            <input id={{ $index }} type="checkbox" name='colors[]' class="color-input pl-3"
                                value="{{ $color->hex }}"
                                {{ in_array($color, old('colors', $data['colors'] ?? [])) ? 'checked' : '' }} />
                            <div id={{ $index }} style="background-color: {{ $color->hex }}"
                                class="color relative w-8 h-8 rounded-full cursor-pointer outline-offset-4 {{ $color === '#ffffff' ? 'border border-black' : '' }}">
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- availability --}}
            <div class="filter__container-option">
                <div class="filter__option__checkbox">
                    <div class="filter__option__title">Is available</div>
                    <div class="checkbox-container">
                        <div class="checkbox-wrapper">
                            <input name="is_available" type="checkbox" class="styled-checkbox"
                                {{ isset($data['is_available']) && $data['is_available'] ? 'checked' : '' }} />
                        </div>
                    </div>
                </div>
            </div>

            {{-- discount --}}
            <div class="filter__container-option">
                <div class="filter__option__checkbox">
                    <div class="filter__option__title">Discounted</div>
                    <div class="checkbox-container">
                        <div class="checkbox-wrapper">
                            <input name="is_discount" type="checkbox" class="styled-checkbox"
                                {{ isset($data['is_discount']) && $data['is_discount'] ? 'checked' : '' }} />
                        </div>
                    </div>
                </div>
            </div>

            {{-- free delivery --}}
            <div class="filter__container-option">
                <div class="filter__option__checkbox">
                    <div class="filter__option__title">Free delivery</div>
                    <div class="checkbox-container">
                        <div class="checkbox-wrapper">
                            <input name="free_delivery" type="checkbox" class="styled-checkbox"
                                {{ isset($data['free_delivery']) && $data['free_delivery'] ? 'checked' : '' }} />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- submit --}}
        <div class="div-button-container">
            <button id="filter__submit" type="submit" class="div-button">
                Search
            </button>
        </div>

    </form>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="js/filter.js" defer></script>
    {{-- <script src="js/slider.js" defer></script> --}}
    <script src="{{ URL::asset('js/checkout/checkout.js') }}"></script>
@endpush
