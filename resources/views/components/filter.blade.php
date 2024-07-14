@php
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
@endphp

<div class="filter">
    <form action="/plp" method="POST">
        @csrf
        <div class="filter__header">
            <div class="filter__title">Filters</div>
            <div class="filter__icon">
                <img src="assets/svg/filter.svg" alt="" />
            </div>
            <button form="reset_filter" name="is_reset" form="" class="filter__reset">Reset</button>
        </div>
        <div class="filter__main">
            <!-- price -->
            <div class="filter__container-option">
                <div class="filter__option__title">Price</div>
                <div class="filter__option">
                    <label for="min-price" class=".option-label"></label>
                    <div class="option-input-container">
                        <input id="min-price" name="min_price"
                            class="filter__option-input @error('max_price') error @enderror "
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

            <!-- Dimentions -->
            <div class="filter__container-option">
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    <div class="filter__option__title">Dimentions</div>
                    <span> (w x h x d)</span>
                </div>
                <div class="filter__option">
                    <label for="product-width" class="option-label"></label>
                    <div class="option-input-container">
                        <input id="product-width" name="product_width"
                            class="filter__option-input @error('product_width') error @enderror"
                            value="{{ old('product_width', $data['product_width'] ?? '') }}" placeholder="W" />
                        @error('product_width')
                            <div class="register__error-tooltip">{{ $message }}</div>
                        @enderror

                    </div>

                    <span class="dash">x</span>

                    <label for="product-height" class=".option-label"></label>
                    <div class="option-input-container">
                        <input id="product-height" name="product_height"
                            class="filter__option-input @error('product_height') error @enderror"
                            value="{{ old('product_height', $data['product_height'] ?? '') }}" placeholder="H" />
                        @error('product_height')
                            <div class="register__error-tooltip">{{ $message }}</div>
                        @enderror
                    </div>
                    <span class="dash">x</span>

                    <label for="product-depth" class=".option-label"></label>
                    <div class="option-input-container">
                        <input id="product-depth" name="product_depth"
                            class="filter__option-input @error('product_depth') error @enderror"
                            value="{{ old('product_depth', $data['product_depth'] ?? '') }}" placeholder="D" />
                        @error('product_depth')
                            <div class="register__error-tooltip">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- colors --}}
            <div class="filter__container-option">
                <div class="filter__option__title">Color</div>
                <div class="color-container">
                    @foreach ($product1->colors as $index => $color)
                        <label>
                            <div class="checkbox-wrapper">
                                <label>
                                    <input type="checkbox" name="colors[]" value="{{ $color }}"
                                        class="styled-checkbox" style="background-color: {{ $color }}"
                                        {{ in_array($color, old('colors', $data['colors'] ?? [])) ? 'checked' : '' }} />
                                </label>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- availability --}}
            <div class="filter__container-option">
                <div class="filter__option__title">Is available</div>
                <div class="checkbox-container">
                    <div class="checkbox-wrapper">
                        <input name="is_available" type="checkbox" class="styled-checkbox"
                            {{ isset($data['is_available']) && $data['is_available'] ? 'checked' : '' }} />
                    </div>
                </div>
            </div>


        </div>
        {{-- search --}}
        <div class="div-button-container">
            <button type="submit" class="div-button">
                Search
            </button>
        </div>
    </form>
    <form method="POST" action="/plp" class="hidden" id="reset_filter">
        @csrf
    </form>
</div>
{{--
@if (isset($data))
    <div>
        <p>{{$data['min_price']}}</p>
    </div>
@endif --}}
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="js/filter.js" defer></script>
@endpush
