@extends('layouts.main')

@section('title', 'Cart page')

@push('styles')

    {{-- item card styler --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/sum-up.css') }}" />
@endpush

@section('content')
    <div class="main-container">
        <div class="inner-container">
            @include('components/cart-item-card')
            @include('components/sum-up')
        </div>
    </div>
@endsection
