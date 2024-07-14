@extends('layouts.main')

@section('title', 'Cart page')

@push('styles')
    {{-- item card styler --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/sum-up.css') }}" />
    {{--    <script src="{{ URL::asset('js/cart/item-card.js') }}"></script> --}}
@endpush

@section('content')
    {{-- removed main container class --}}
    <div class="">
        <div class="inner-container">
            @include('components/cart-item-card')
            @include('components/sum-up')
        </div>
    </div>
@endsection
