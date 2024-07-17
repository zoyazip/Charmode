@extends('layouts.main')

@section('title', 'Admin Panel page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
@endpush

@section('content')
    <div class="admin__container">
        <div class="hi__div">
            <h1>Hi, Admin!</h1>
            <button onclick="window.location='/adminproducts/create'" class="admin__btn green">Add product</button>
            <button onclick="window.location='/orders'" class="admin__btn green">Orders</button>
        </div>
        <div class="one-product__row">
            <div class="one-product__row-left">
                <div>Product Code</div>
                <div>Product Name</div>
            </div>
            <div>Show More</div>
        </div>
            @if (isset($products))
                @foreach ($products as $product)
                <div class="one-product__row">
                    <div class="one-product__row-left">
                        <div>{{$product->product_code}}</div>
                        <div>{{$product->name}}</div>
                    </div>
                    <button onclick="window.location='/adminproducts/{{$product->id}}'">Show More</button>
                </div>
                @endforeach
            @endif
    </div>
    <script src="js/admin/admin.js"></script>
@endsection
