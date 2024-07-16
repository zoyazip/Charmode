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
            @include('components/cart-item-card')
            @include('components/sum-up')
{{--            @include('components/checkout-button')--}}

            <div class="middle-wrapper checkout-section">
                <div class="checkout-section__left">
                    <button class="checkout-section__continue-btn">Continue shopping</button>
                    <button>Reset</button>
                </div>
                <div class="checkout-section__right">

                <x-checkout-button checkoutPrice="30"></x-checkout-button>
                </div>

            </div>
        </div>
    </div>
@endsection
