@push('styles')
    {{-- main slider stylesheets --}}
    <link rel="stylesheet" href="css/filter.css">
    <link
			href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css"
			rel="stylesheet"
		/>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
        <script src="js/filter.js" defer></script>
@endpush
@php
    if (!class_exists('ProductTmpf')){
        class ProductTmpf
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

            public function __construct($id, $title, $price, $discount, $old_price, $expand, $free_delivery, $img_path, $colors, $product_code, $rating, $comments_count)
            {
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

    $product1 = new ProductTmpf(1, 'Krēsls Comfivo 204 (Aston 8)', 100.0, 10, 110.0, false, false, ['assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png'], ['#F64141', '#2F591B', '#4289F4', '#ffffff', '#000000'], '2281488ZV', 7.8, 27 )


@endphp

<div class="filter">
    <div class="filter__header">
        <div class="filter__title">Filters</div>
        <div class="filter__icon">
            <img src="assets/svg/filter.svg" alt="" />
        </div>
        <div class="filter__reset">Reset</div>
    </div>
    <div class="filter__main">
        <div class="filter__option__title">Price</div>
        <!-- price -->
        <div class="filter__option">
            <label for="min-price" class=".option-label"></label>
            <div class="option-input-container">
                <input id="min-price" class="filter__option-input" placeholder="Min" />
                <span class="currency-symbol">€</span>
            </div>

            <span class="dash">-</span>

            <label for="max-price" class=".option-label"></label>
            <div class="option-input-container">
                <input id="max-price" class="filter__option-input" placeholder="Max" />
                <span class="currency-symbol">€</span>
            </div>
        </div>

        <div class="filter__option">
            <div class="slider-container">
                <div id="price-slider"></div>
            </div>
        </div>
        <!-- Dimentions -->
        <div class="filter__option__title">Dimentions</div>
        <span> (w x h x d)</span>
        <div class="filter__option">
            <label for="product-width" class="option-label"></label>
            <div class="option-input-container">
                <input id="product-width" class="filter__option-input" placeholder="W" />
            </div>

            <span class="dash">x</span>

            <label for="product-height" class=".option-label"></label>
            <div class="option-input-container">
                <input id="product-height" class="filter__option-input" placeholder="H" />
            </div>
            <span class="dash">x</span>

            <label for="product-depth" class=".option-label"></label>
            <div class="option-input-container">
                <input id="product-depth" class="filter__option-input" placeholder="D" />
            </div>
        </div>
        <div class="filter__option__title">Color</div>

        <div class="color-container">
            @foreach ($product1->colors as $index => $color)
                <label>
                    <div class="checkbox-wrapper">
                        <!-- I have no idea how to connect this checkbox and the div below-->
                        {{-- <input id="{{ $index }}" type="radio" class="color-input" />
                        <div
                            style="background-color: {{ $color }}"
                            id="swatch-{{ $index }}"
                            class="color w-10 h-10 rounded-full cursor-pointer {{ $color === '#ffffff' ? 'border border-black' : '' }} filter__swatch"
                        ></div> --}}
                        <label>
                            <div class="checkbox-wrapper">
                                <input
                                    type="checkbox"
                                    class="styled-checkbox"
                                    style="background-color: {{ $color }}"
                                />
                            </div>
                        </label>
                    </div>
                </label>
            @endforeach
        </div>

        <div class="filter__option__title">Is available</div>

        <div class="checkbox-container">
            <div class="checkbox-wrapper">
                <input type="checkbox" class="styled-checkbox" />
            </div>
        </div>

        <div class="div-button">
            Search
        </div>
    </div>
</div>
