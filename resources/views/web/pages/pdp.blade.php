<style>
    .color-input {
        display: none;
    }

    /* .color-input[type="radio"]:checked+.color {
        box-shadow: 0px 0px 0px 2px #2F591B;
    } */

    .color-input[type="radio"]:checked+.color::after {
        content: '';
        width: 100%;
        height: 100%;
        border-radius: 100%;
        outline: 1px solid black;
        outline-offset: 2px;
        position: absolute;

    }

    .like-checkbox {
        display: none;
    }

    /* .like-checkbox[type="checkbox"]:checked + .like-element{
        box-shadow: 0px 0px 0px 2px #2F591B;
    } */

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
        public $description;
        public $characteristics;

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
            $max_count,
            $description,
            $characteristics,
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
            $this->max_count = $max_count;
            $this->description = $description;
            $this->characteristics = $characteristics;
        }
    }

    $product1 = new Product(
        1,
        'Krēsls Comfivo 204 (Aston 8)',
        100.0,
        10,
        110.0,
        false,
        10,
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
        10,
        "Indulge in the epitome of opulence with the Monarch Velvet Armchair, a masterpiece that blends timeless elegance with modern sophistication. Handcrafted from the finest materials, this chair features sumptuous velvet upholstery that invites you to sink into its plush depths. The meticulously carved wooden legs and gracefully curved arms showcase exceptional artistry, making it a stunning focal point in any room. \n\nWhether placed in a grand living area or an intimate reading nook, the Monarch Velvet Armchair promises to elevate your space with its regal charm and unparalleled comfort. Perfect for those who appreciate the finer things in life, this chair is not just a piece of furniture—it's a statement of style and luxury.",
        [
            'Category' => 'Chair',
            'Height' => '229',
            'Width' => '221',
            'Depth' => '225',
            'Material' => 'Wood',
            'Color' => 'Red',
            'Weight' => '15kg',
            'Manufacturer' => 'Furniture Co.',
            'Category1' => 'Chair',
            'Height2' => '229',
            'Width3' => '221',
            'Depth4' => '225',
            'Material5' => 'Wood',
            'Color6' => 'Red',
            'Weight7' => '15kg',
            'Manufacturer8' => 'Furniture Co.',
        ],
    );

    class Comments
    {
        public $commentId;
        public $productId;
        public $author;
        public $comment;
        public $rating;

        public function __construct($commentId, $productId, $author, $comment, $rating)
        {
            $this->commentId = $commentId;
            $this->productId = $productId;
            $this->author = $author;
            $this->comment = $comment;
            $this->rating = $rating;
        }
    }

    $comments = [
        new Comments(0, 1, 'Stepans Pandera', 'Very good, very nice!', 7.8),
        new Comments(
            1,
            1,
            'Adolfs Titler',
            'Indulge in the epitome of opulence with the Monarch Velvet Armchair, a masterpiece that blends timeless elegance with modern sophistication. Handcrafted from the finest materials, this chair features sumptuous velvet upholstery that invites you to sink into its plush depths. The meticulously carved wooden legs and gracefully curved arms showcase exceptional artistry, making it a stunning focal point in any room.',
            2,
        ),
        new Comments(2, 1, 'Chip and Dale', 'The meticulously carved wooden legs.', 5.3),
    ];
@endphp


@extends('layouts.main')

@section('title', 'Product page')

@section('content')
    <div class="inner-container">
        <div class="product-main-info-container h-auto w-full md:h-[70vh] flex flex-col md:flex-row gap-8">
            @include('../../components/PDP-components/pdp-gallery')
            @include('../../components/PDP-components/pdp-main-info-form')
        </div>
        <div class="pdp-description-container mt-10 md:w-full flex flex-col md:flex-row gap-4">
            @include('../../components/PDP-components/pdp-description')
            @include('../../components/PDP-components/pdp-characteristics')
        </div>
        <hr class="mt-24"/>
        <div class="pdp-comments-container mt-10 w-full">
            @include('../../components/PDP-components/pdp-comments')
        </div>
        <div class="pdp-comment-form-container flex justify-center mt-10 mb-20 w-full">
            @include('../../components/PDP-components/pdp-comment-form')
        </div>
        <div class="pdp-suggestion-container h-auto mt-20 mb-20 md:mt-14">
            @include('../../components/PDP-components/pdp-suggestion')
        </div>
    </div>
@endsection
