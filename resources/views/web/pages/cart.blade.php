<!DOCTYPE html>
@extends('layouts.main')

@section('title', 'Cart page')

@push('styles')
    {{-- item card styling --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/sum-up.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/checkout-button.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/checkout-section.css') }}" />
@endpush

@section('content')
    {{-- removed main container class --}}
    @if (count($cartItems) === 0)
        <div class="flex h-[50vh] justify-center items-center">
            <h1>OOps.. Your cart is empty</h1>
        </div>
    @else
        <div class="inner-container">
            <form id="update-form" target="_self" action="/cart" method="post">
                @csrf
                @method('PATCH')
            </form>
            @foreach ($cartItems as $product)
                @include('components/cart-item-card')
                <hr>
            @endforeach
            @include('components/sum-up')

            <div class="middle-wrapper checkout-section">
                <div class="checkout-section__left">
                    <form target="_self" action="/">
                        <button class="checkout-section__continue-btn">Continue shopping</button>
                    </form>
                    <form target="_self" action="/cart" method="post" id="reset-form">
                        @csrf
                        @method('delete')
                        <button type="submit">Reset</button>
                    </form>
                </div>
                <div class="checkout-section__right">
                    <x-checkout-button
                        checkoutPrice="{{ number_format($productPriceSum + $deliveryPriceSum, 2, ',', '.') }}"></x-checkout-button>
                </div>
            </div>
        </div>
    @endif
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const allFormFields = document.querySelectorAll(".item-wrapper__more-or-less")
            for (const form of allFormFields) {
                const inputField = form.children[1]
                form.addEventListener("click", (e) => {
                    console.log(e)
                    if (e.target.classList.contains("minus")) {
                        inputField.stepUp(-1)
                        submitUpdateForm()
                    }
                    if (e.target.classList.contains("plus")) {
                        inputField.stepUp(1)
                        submitUpdateForm()
                    }
                })
            }

            function submitUpdateForm() {
                const form = document.getElementById('update-form');
                const formData = new FormData(form);
                console.log(form)
                console.log(formData)
                fetch('/cart', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload()
                        } else {}
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        })
    </script>
@endpush
