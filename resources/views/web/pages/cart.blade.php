@extends('layouts.main')

@section('title', 'Cart page')

@push('styles')
    {{-- item card styler --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/sum-up.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/checkout-button.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/checkout-section.css') }}" />

    {{--    <script src="{{ URL::asset('js/cart/item-card.js') }}"></script> --}}
@endpush

@section('content')
    {{-- removed main container class --}}
    <div class="">
        <div class="inner-container">


            @foreach($cartWithProducts as $product)
                @include('components/cart-item-card')
                <hr>
            @endforeach
            @include('components/sum-up')

            <div class="middle-wrapper checkout-section">

                    <div class="checkout-section__left">
                        <form target="_self" action="/plp">
                            <button class="checkout-section__continue-btn">Continue shopping</button>
                        </form>
                        <button>Reset</button>
                    </div>
                    <div class="checkout-section__right">

                        <x-checkout-button checkoutPrice="{{number_format($productPriceSum + $deliveryPriceSum, 2, ',', '.') }}"></x-checkout-button>
                    </div>



            </div>
        </div>
    </div>
@endsection
