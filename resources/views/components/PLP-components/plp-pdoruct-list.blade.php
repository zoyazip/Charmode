@php

    class Product
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
            $this->title = $title;
            $this->price = $price;
            $this->discount = $discount;
            $this->old_price = $old_price;
            $this->expand = $expand;
            $this->free_delivery = $free_delivery;
            $this->img_path = $img_path;
        }
    }

    $products = [
        ($product1 = new Product(1, 'Product 1', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product2 = new Product(2, 'Product 2', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product3 = new Product(3, 'Product 3', 150.0, 20, 180.0, false, false, 'assets/chair-placeholder.png')),
        ($product4 = new Product(4, 'Product 4', 150.0, 0, 150.0, true, false, 'assets/chair-placeholder.png')),
        ($product5 = new Product(5, 'Product 5', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product6 = new Product(6, 'Product 6', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product7 = new Product(7, 'Product 7', 150.0, 20, 180.0, false, true, 'assets/chair-placeholder.png')),
        ($product8 = new Product(8, 'Product 8', 150.0, 0, 150.0, false, false, 'assets/chair-placeholder.png')),
        ($product9 = new Product(9, 'Product 9', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product10 = new Product(10, 'Product 10', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product11 = new Product(11, 'Product 11', 150.0, 20, 180.0, true, true, 'assets/chair-placeholder.png')),
        ($product12 = new Product(12, 'Product 12', 150.0, 0, 150.0, false, false, 'assets/chair-placeholder.png')),
        ($product13 = new Product(1, 'Product 1', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product14 = new Product(2, 'Product 2', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product15 = new Product(3, 'Product 3', 150.0, 20, 180.0, false, false, 'assets/chair-placeholder.png')),
        ($product16 = new Product(4, 'Product 4', 150.0, 0, 150.0, true, false, 'assets/chair-placeholder.png')),
        ($product17 = new Product(5, 'Product 5', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product18 = new Product(6, 'Product 6', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product19 = new Product(7, 'Product 7', 150.0, 20, 180.0, false, true, 'assets/chair-placeholder.png')),
        ($product20 = new Product(8, 'Product 8', 150.0, 0, 150.0, false, false, 'assets/chair-placeholder.png')),
        ($product21 = new Product(9, 'Product 9', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product22 = new Product(10, 'Product 10', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product23 = new Product(11, 'Product 11', 150.0, 20, 180.0, true, true, 'assets/chair-placeholder.png')),
        ($product24 = new Product(12, 'Product 12', 150.0, 0, 150.0, false, false, 'assets/chair-placeholder.png')),
    ];
@endphp
<div class="plp">
    <div class="plp-sort">
        @include('components/list-sort')
    </div>
    <div class="plp-list grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
        @foreach ($products as $product)
            @include('components/product-card', ['plp' => true])
        @endforeach
    </div>
</div>
