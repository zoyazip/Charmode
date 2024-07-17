@php
    class Product_Sugg
    {
        public $id;
        public $title;
        public $price;
        public $discount;
        public $old_price;
        public $expand;
        public $free_delivery;
        public $img_path;

        public function __construct($id, $title, $price, $discount, $old_price, $expand, $free_delivery, $img_path)
        {
            $this->id = $id;
            $this->name = $title;
            $this->newPrice = $price;
            $this->discount = $discount;
            $this->oldPrice = $old_price;
            $this->expand = $expand;
            $this->free_delivery = $free_delivery;
            $this->img_path = $img_path;
        }
    }

    $products = [
        ($product1 = new Product_Sugg(1, 'Product 1', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product2 = new Product_Sugg(2, 'Product 2', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product3 = new Product_Sugg(3, 'Product 3', 150.0, 20, 180.0, false, false, 'assets/chair-placeholder.png')),
        ($product4 = new Product_Sugg(4, 'Product 4', 150.0, 0, 150.0, true, false, 'assets/chair-placeholder.png')),
        ($product5 = new Product_Sugg(5, 'Product 4', 150.0, 0, 150.0, true, false, 'assets/chair-placeholder.png')),
    ];
@endphp

<div class="pdp-suggestion">
    <div class="pdp-suggestion-title">
        <h3 class="font-bold text-2xl text-main-green">You should also like</h3>
    </div>
    <div class="suggestions grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 mt-10 w-full ">
        @foreach ($products as $product)
            @include('components/product-card', ['suggestion' => true])
        @endforeach

    </div>
</div>

<script src="{{ URL::asset('js/product_card.js') }}"></script>
