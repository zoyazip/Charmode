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

            <form id="update-form" target="_self" action="/cart" method="post">
                @csrf
                @method('PATCH')
            </form>
                @foreach($cartWithProducts as $product)

                    @include('components/cart-item-card')
                    <hr>
                @endforeach


            @include('components/sum-up')

            <div class="middle-wrapper checkout-section">

                    <div class="checkout-section__left">
                        <form target="_self" action="/">
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


<script>

    document.addEventListener('DOMContentLoaded', () => {

        const allFormFields = document.querySelectorAll(".item-wrapper__more-or-less")




        for (const form of allFormFields){

            const inputField = form.children[1]


            form.addEventListener("click", (e) => {
                console.log(e)
                if(e.target.classList.contains("minus")){
                    inputField.stepUp(-1)
                    submitUpdateForm()
                }
                if(e.target.classList.contains("plus")){
                    inputField.stepUp(1)
                    submitUpdateForm()
                }
            })




            }

        function submitUpdateForm(){
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
                    } else {
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }






    })



</script>
