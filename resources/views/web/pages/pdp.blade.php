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
        public $color;
        public $product_code;
        public $rating;
        public $comments_count;

        public function __construct($id, $title, $price, $discount, $old_price, $expand, $free_delivery, $img_path, $color, $product_code, $rating, $comments_count)
        {
            $this->id = $id;
            $this->title = $title;
            $this->price = $price;
            $this->discount = $discount;
            $this->old_price = $old_price;
            $this->expand = $expand;
            $this->free_delivery = $free_delivery;
            $this->img_path = $img_path;
            $this->color = $color;
            $this->product_code = $product_code;
            $this->rating = $rating;
            $this->comments_count = $comments_count;
        }
    }

        $product1 = new Product(1, 'Krēsls Comfivo 204 (Aston 8)', 100.0, 10, 110.0, false, false, ['assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png'], ['red', 'green', 'blue'], '2281488ZV', 7.8, 27 )


@endphp


@extends('layouts.main')

@section('title', 'Product page')

@section('content')
    <div class="inner-container">
        <div class="product-main-info-container w-full flex gap-8 flex-col md:flex-row">
            <div class="gallery-container flex flex-col gap-4 bg-green-700 w-full h-[380px] md:h-[600px]">
                <div class="full-image-container h-4/5 w-full bg-red-700">
                    <img src={{ $product1->img_path[0] }} class="w-full h-full bg-no-repeat bg-cover object-cover rounded-2xl"/>
                </div>
                <div class="image-list-container bg-pink-600 overflow-x-scroll flex gap-4 w-full h-1/5">
                    @foreach ($product1->img_path as $index => $image)
                        <img src={{ $image }} class="h-full rounded-xl"/>
                    @endforeach
                </div>
            </div>
            <div class="main-info-container bg-blue-700 w-full h-[380px] md:h-[600px] p-10">
                <div class="product-title">
                    <h2 class="font-bold text-3xl text-main-green">{{ $product1->title }}</h2>
                </div>
                <div class="product-code">
                    <p class="text-secondary-grey">Product code: {{ $product1->product_code }}</p>
                </div>
                <div class="rating-and-comments-container flex gap-6">
                    <div class="rating flex gap-2">
                        <h3 class="text-gold font-bold text-xl">{{ $product1->rating }}</h3>
                        <img src='assets/svg/rating.svg' />
                    </div>
                    <div class="comments flex gap-2">
                        <h3 class="text-main-green font-bold text-xl">{{ $product1->comments_count }}</h3>
                        <img src='assets/svg/comment.svg' />
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

<script>
    const currentImage_Id = 0
</script>