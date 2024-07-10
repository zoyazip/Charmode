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
        ($product1 = new Product(5, 'Product 5', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product2 = new Product(6, 'Product 6', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product3 = new Product(7, 'Product 7', 150.0, 20, 180.0, false, true, 'assets/chair-placeholder.png')),
        ($product4 = new Product(8, 'Product 8', 150.0, 0, 150.0, false, false, 'assets/chair-placeholder.png')),
        ($product1 = new Product(9, 'Product 9', 100.0, 10, 110.0, false, false, 'assets/chair-placeholder.png')),
        ($product2 = new Product(10, 'Product 10', 200.0, 15, 230.0, false, false, 'assets/chair-placeholder.png')),
        ($product3 = new Product(11, 'Product 11', 150.0, 20, 180.0, true, true, 'assets/chair-placeholder.png')),
        ($product4 = new Product(12, 'Product 12', 150.0, 0, 150.0, false, false, 'assets/chair-placeholder.png')),
        // ($product1 = new Product(13, 'Product 13', 100.0, 10, 110.0, false)),
        // ($product2 = new Product(14, 'Product 14', 200.0, 15, 230.0, false)),
        // ($product3 = new Product(15, 'Product 15', 150.0, 20, 180.0, false)),
        // ($product4 = new Product(16, 'Product 16', 150.0, 0, 150.0, false)),
        // ($product1 = new Product(17, 'Product 17', 100.0, 10, 110.0, false)),
        // ($product2 = new Product(18, 'Product 18', 200.0, 15, 230.0, false)),
        // ($product3 = new Product(19, 'Product 19', 150.0, 20, 180.0, false)),
        // ($product4 = new Product(20, 'Product 20', 150.0, 0, 150.0, false)),
        // ($product1 = new Product(21, 'Product 21', 100.0, 10, 110.0, false)),
        // ($product2 = new Product(22, 'Product 22', 200.0, 15, 230.0, false)),
        // ($product3 = new Product(23, 'Product 23', 150.0, 20, 180.0, false)),
        // ($product4 = new Product(24, 'Product 24', 150.0, 0, 150.0, false)),
    ];
@endphp

<body>
    <div class=" flex flex-col items-center justify-center py-10">
        <div class="inner-container max-w-[1200px] w-[90%] h-full">
            <div
                class="grid-layout w-full grid gap-3 grid-flow-dense grid-rows-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $index => $product)
                    <div id='product-{{ $product->id }}'
                        style="background-image: url('{{ $product->img_path }}'); backgroud-repeat: no-repeat; background-position: center; background-size: 110% "
                        class="product-card p-4 min-h-[300px] rounded-2xl overflow-hidden relative transition-all bg-center 
                                {{-- bg-[url('{{ $product->img_path }}')] bg-no-repeat  --}}
                                @if ($product->expand) lg:col-span-2 lg:row-span-2 @endif">
                        <div class="card-data flex flex-col justify-between h-full">
                            @include('components/price', [
                                'price' => $product->price,
                                'old_price' => $product->old_price,
                            ])
                            <div class="card__title-container w-full flex justify-between items-center z-10">
                                <div class="title">
                                    <h3 class="font-bold text-white text-xl">{{ $product->title }}</h3>
                                </div>
                                <div
                                    class="add-to-cart w-10 h-10 rounded-full bg-white lg:opacity-0 lg:-translate-x-5 transition-all cursor-pointer">
                                </div>
                            </div>
                            <div
                                class="card-gradiet absolute h-1/2 w-full bottom-0 left-0 bg-gradient-to-t from-gray-800 opacity-50 z-1">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        [...document.querySelectorAll('.product-card')].forEach(function(item) {

            const selectedProduct = document.getElementById(item.id)
            const selectedProductBtn = selectedProduct.querySelector('.card-data').querySelector(
                '.card__title-container').querySelector('.add-to-cart')

            item.addEventListener('mouseenter', function() {
                item.style.backgroundSize = '100%'
                selectedProductBtn.style.opacity = 1
                selectedProductBtn.style.transform = 'translateX(0px)'
            })
            item.addEventListener('mouseleave', function() {
                item.style.backgroundSize = '110%'
                selectedProductBtn.style.opacity = 0
                selectedProductBtn.style.transform = 'translateX(-20px)'
            })
        })
    </script>