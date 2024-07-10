@extends('layouts.main')

@section('title', 'Cart page')

@push('styles')

    {{-- item card styler --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
@endpush

@section('content')
    <div class="main-container">
        <h1>Welcome to the Cart Page</h1>
        <p>This is the content of the cart page.</p>
        @include('components/cart-item-card')
    </div>
@endsection
