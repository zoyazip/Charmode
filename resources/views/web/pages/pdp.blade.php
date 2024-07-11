<style>

    .color-input {
        display: none;
    }

    .color-input[type="radio"]:checked + .color{
        box-shadow: 0px 0px 0px 2px #2F591B;
    }

    .counter::-webkit-outer-spin-button,
    .counter::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .counter[type=number] {
        -moz-appearance: textfield;
    }

</style>


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
        public $colors;
        public $product_code;
        public $rating;
        public $comments_count;
        public $max_count;

        public function __construct($id, $title, $price, $discount, $old_price, $expand, $free_delivery, $img_path, $colors, $product_code, $rating, $comments_count, $max_count)
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
            $this->max_count = $max_count;
        }
    }

        $product1 = new Product(1, 'Krēsls Comfivo 204 (Aston 8)', 100.0, 10, 110.0, false, 0, ['assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png', 'assets/chair-placeholder.png'], ['#F64141', '#2F591B', '#4289F4', '#ffffff', '#000000'], '2281488ZV', 7.8, 27, 10 )


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
            <form class="main-info-container w-full h-[380px] md:h-[600px] p-10">
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
                <div class="product-color mt-4">
                    <h3 class="text-xl font-bold text-main-green">Color</h3>
                    <div class="color-container flex gap-2 pt-2">
                        @foreach ($product1->colors as $index => $color)
                            <label>
                                <input id={{ $index }} type="radio" name='color' class="color-input pl-3" @checked( $index == 0 ? true : false) />
                                <div id={{ $index }} style="background-color: {{ $color }}" class="color w-10 h-10 rounded-full cursor-pointer {{ $color === '#ffffff' ? 'border border-black' : '' }}"></div>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="counter-container mt-4">
                    <div class="counter-label text-xl font-bold text-main-green"><h3>Count</h3></div>
                    <div class="conter flex flex-row items-center gap-4 font-bold text-main-green mt-2">
                        <div class="decrement"><span class="decrement_text text-xl cursor-pointer text-secondary-grey">-</span></div>
                        <div class=""><input type='number' value='1' min="1" max='{{ $product1->max_count }}' class="counter text-xl w-10 text-center outline-none"/></div>
                        <div class="increment"><span class="increment_text text-xl cursor-pointer">+</span></div>
                    </div>
                </div>
                <div class="price-container mt-4">
                    <div class="price"><h2 class="font-bold text-5xl text-main-green">{{ $product1->price }} €</h2></div>
                    <div class="delivery-container">
                        <img src="assets/svg/delivery.svg">
                        <h4></h4>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    

    document.addEventListener('DOMContentLoaded', () => {
        const currentImage_Id = 0
        const MAX_COUNT = document.querySelector('.counter').max

        let productCount = 1

        const counter = document.querySelector('.counter')
        const counter_increment = document.querySelector('.increment')
        const counter_decrement = document.querySelector('.decrement')

        const increment_text = counter_increment.querySelector('.increment_text')
        const decrement_text = counter_decrement.querySelector('.decrement_text')

        counter_increment.addEventListener('click', () => {
            if (productCount < MAX_COUNT) {
                productCount++
                counter.value = `${productCount}`
            }
            greyout(productCount, MAX_COUNT, increment_text)
            decrement_text.style.color = '#204012'

        })

        counter_decrement.addEventListener('click', () => {
            if (productCount > 1) {
                productCount--
                counter.value = `${productCount}`
            }
            greyout(productCount, 1, decrement_text)
            increment_text.style.color = '#204012'
            
        })

        counter.addEventListener('change', (e) => {
            if (e > MAX_COUNT) {
                productCount = MAX_COUNT
                counter.value = `${productCount}`

            }
            
        })

    })

    const greyout = (count, value, obj) => {
        if (count == value) {
            obj.style.color = '#ADADAD'
        } 
    }
    
</script>