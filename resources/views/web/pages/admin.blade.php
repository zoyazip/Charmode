@extends('layouts.main')

@section('title', 'Admin Panel page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
@endpush

@section('content')
    <div class="admin__container pb-10">
        <div class="hi__div py-10">
            <h1 class="text-main-green">Hi, Admin!</h1>
            <div class="">
                <button onclick="window.location='/orders'" class="admin__btn">Orders</button>
                <button onclick="window.location='/adminproducts/create'" class="px-4 py-2 rounded-lg bg-main-green text-white hover:shadow-lg transition-all">Add product</button>
            </div>
            
        </div>
        <div class="one-product__row">
            <div class="one-product__row-left font-bold text-main-green">
                <div><span>Product Code</span></div>
                <div><span>Product Name</span></div>
            </div>
            <div class="font-bold text-main-green">Action</div>
        </div>
            @if (isset($products))
                @foreach ($products as $product)
                <div class="one-product__row hover:bg-green-100 transition-all">
                    <div class="one-product__row-left">
                        <div>{{$product->product_code}}</div>
                        <div>{{$product->name}}</div>
                    </div>
                    <button onclick="window.location='/adminproducts/{{$product->id}}'"><img src="{{ URL::asset('assets/svg/link_arrow.svg') }}" /></button>
                </div>
                @endforeach
            @endif
    </div>
    <script src="js/admin/admin.js"></script>
@endsection
