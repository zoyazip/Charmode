@extends('layouts.main')

@section('title', 'One product page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
@endpush

@section('content')
    <div class="inner-container">
        <h1>Hi, Admin!</h1>
        <button onclick="window.location='/adminproducts'">To all products</button>
        <button onclick="window.location='/adminproducts/edit/{{$product->id}}'">Labot</button>
        {{-- <p>{{$product->id}}</p> --}}
        <h3>Name: {{$product->name}}</h3>
        <h4>Product code: {{$product->product_code}}</h4>
        <h4>Category: {{$product->subCategory->category->name}}</h4>
        <h4>Subcategory: {{$product->subCategory->name}}</h4>
        <h4>Old price: {{$product->oldPrice}} EUR</h4>
        <h4>New price: {{$product->newPrice}} EUR</h4>
        <h4>Discount: {{$product->discount}} %</h4>
        <h4>Stock quantity: {{$product->stockQuantity}}</h4>
        <h4>Shipping cost: {{$product->shippingCost}} EUR</h4>
        <h4>Description: </h4>
        <p>{{$product->description}}</p>

        <h4>Product colors:</h4>
        <div class="product-color__div">
            @if(sizeof($product->productColors) > 0)
            @foreach($product->productColors as $productColor)
            <div style="background-color: {{$productColor->color->hex}};" class="each-color__div"></div>
            @endforeach
            @endif
        </div>

        <h4>Product specifications:</h4>
        <div class="product-specification__div">
            @if(sizeof($product->specifications) > 0)
            @foreach($product->specifications as $specification)
                <h4>{{$specification->key}}: {{$specification->value}}</h4>
            @endforeach
            @endif
        </div>

        <h4>Product images:</h4>
        <div class="product-image__div">
            @if(sizeof($product->images) > 0)
            @foreach($product->images as $image)
                <img src="{{$image->url}}">
            @endforeach
            @endif
        </div>

        <h4>Product reviews:</h4>
        <div class="review__row">
            <div class="row__div">Review id</div>
            <div class="row__div">Author</div>
            <div class="row__div">Rating</div>
            <div class="row__div">Comment</div>
            <div class="row__div row__div_right">Delete</div>
        </div>
        @if(sizeof($product->reviews) > 0)
        @foreach($product->reviews as $review)
        <div class="review__row">
            <div class="row__div">{{$review->id}}</div>
            <div class="row__div">{{$review->user->full_name}}</div>
            <div class="row__div">{{$review->rating}}</div>
            <div class="row__div">{{$review->comment}}</div>
            <form class="row__div row__div_right" method="GET" action="/reviews/delete/{{$review->id}}">
                @csrf
                <input type="submit" value="Delete review">
            </form>
        </div>
        @endforeach
        @endif<form method="GET" action="/adminproducts/delete/{{$product->id}}">
            @csrf
            <input type="submit" value="Delete product">
        </form>

        
        @push('scripts')
                <script src="{{ URL::asset('js/admin/admin.js') }}"></script>
        @endpush

    </div>
@endsection
