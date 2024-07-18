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





@if(Auth::check())
{{--    User is logged in--}}





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
                        checkoutPrice="{{ number_format($productPriceSum + $deliveryPriceSum, 2, ',', '.') }}" goToSite="/checkout"></x-checkout-button>
                </div>
            </div>
        </div>
    @endif
    @endsection


@else
{{--User is not logged in--}}
@section('content')

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
            @include('components/cart-item-card-guests')
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
                    checkoutPrice="{{ number_format($productPriceSum + $deliveryPriceSum, 2, ',', '.') }}" goToSite="/checkout"></x-checkout-button>
            </div>
        </div>
    </div>
    @endsection

@endif


@endif
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const allFormFields = document.querySelectorAll(".item-wrapper__more-or-less")
            for (const form of allFormFields) {
                const inputField = form.children[1]
                const maxValueForInput = parseInt(inputField.max)
                const minusText = form.children[0].children[0]
                const plusText = form.children[2].children[0]
                const inputFieldValue = parseInt(inputField.value)


                if (inputFieldValue === maxValueForInput){
                        plusText.style.color = "#ADADAD"
                    } else if (inputFieldValue === 1){
                        minusText.style.color = "#ADADAD"
                    }


                    form.addEventListener("click", (e) => {
                    if (e.target.classList.contains("minus")) {
                        if (inputFieldValue > 1 ){
                            inputField.stepUp(-1)
                            submitUpdateForm()
                        }

                    }
                    if (e.target.classList.contains("plus")) {
                        if(inputFieldValue < maxValueForInput){
                            inputField.stepUp(1)
                            submitUpdateForm()
                        }

                    }
                })

                inputField.addEventListener("change", ()=> {

                    if (inputField.value > maxValueForInput){
                        inputField.value = maxValueForInput
                        submitUpdateForm()

                    } else if (inputField.value < 1) {
                        inputField.value = 1
                        submitUpdateForm()
                    } else{
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
