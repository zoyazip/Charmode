@extends('layouts.main')

@section('title', 'Checkout page')


@push('styles')
    {{-- item card styler --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/sum-up.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/checkout/checkout.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/checkout/iti.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/css/intlTelInput.css">
@endpush

@section('content')
    <div class="checkout__container">
        <div class="checkout__whole-form">
            <form method="POST" action="/to_checkout">
                @csrf

                <div class="checkout__container__div">
                    <div class="checkout__title__data">
                        <div class="left" onclick="openBlock('checkout__form', 'clientDataArrow')">
                            <h3 class="green-text">Client Data</h3>
                            <img id="clientDataArrow" class="checkout__arrow rotate-arrow"
                                src="{{ URL::asset('assets/svg/chevron-bottom.svg') }}" />
                        </div>
                        @guest
                            <div class="right">
                                <h6 class="thin-text">Have an account?</h6>
                                <button class="login-link-checkout" class="underline green-text login-btn"
                                    type="button">Login</button>
                            </div>
                        @endguest
                    </div>
                    <div id="checkout__form" class="checkout__form" style="display: flex;">
                        <div class="checkout__input-wrapper">
                            <label for="checkoutemail">Email Address*</label>
                            <input class="@error('checkoutemail') is-invalid @enderror" placeholder="Your email address"
                                type="text" id="checkoutemail" name="checkoutemail"
                                value="{{ old('checkoutemail') ?? (auth()->user()->email ?? '') }}">

                            @error('checkoutemail')
                                <p class="checkout__error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="checkout__container-rowupper">
                            <div class="checkout__input-wrapper">
                                <label for="checkoutfullname">Full Name*</label>
                                <input type="text" name="checkoutfullname" id="checkoutfullname"
                                    value="{{ old('checkoutfullname') ?? (auth()->user()->full_name ?? '') }}"
                                    placeholder="Your name">
                            </div>
                            <div class="checkout__input-wrapper">
                                <label for="checkoutphone">Phone Number*</label>
                                <input name="checkoutphonecode" id="checkoutphonecode" type="tel">
                            </div>
                        </div>

                        <div class="checkout__input-wrapper">
                            <label for="checkoutcomment">Message</label>
                            <textarea placeholder="Enter text here..." type="text" id="checkoutcomment" name="checkoutcomment"
                                value="{{ old('comment') }}"></textarea>
                        </div>
                    </div>

                    <div class="checkout__title__data">
                        <div class="left" onclick="openBlock('delivery__container', 'deliveryDataArrow')">
                            <h3 class="green-text">Delivery Data</h3>
                            <img id="deliveryDataArrow" class="checkout__arrow"
                                src="{{ URL::asset('assets/svg/chevron-bottom.svg') }}" />
                        </div>
                    </div>

                    <div id="delivery__container" class="checkout__form" style="display: none;">
                        <div class="checkout__input-wrapper">
                            <label for="checkoutcountry">Country/Region</label>
                            <input name="checkoutcountry" id="checkoutcountry" type="country" placeholder="Your country">
                        </div>

                        <div class="checkout__container-rowupper">
                            <div class="checkout__input-wrapper">
                                <label for="checkoutcity">City*</label>
                                <input class="@error('city') is-invalid @enderror" placeholder="Your city" type="text"
                                    id="checkoutcity" name="checkoutcity"
                                    value="{{ old('city') ?? (auth()->user()->city ?? '') }}">

                                @error('city')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="checkout__input-wrapper">
                                <label for="checkoutzip">Zip code*</label>
                                <input class="@error('zip') is-invalid @enderror" placeholder="Your zip code" type="text"
                                    id="checkoutzip" name="checkoutzip"
                                    value="{{ old('zip') ?? (auth()->user()->address ?? '') }}">
                                @error('zip')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="checkout__container-rowupper">
                            <div class="checkout__input-wrapper">
                                <label for="checkoutaddress">Address*</label>
                                <input class="@error('address') is-invalid @enderror" placeholder="Your address"
                                    type="text" id="checkoutaddress" name="checkoutaddress"
                                    value="{{ old('address') ?? (auth()->user()->address ?? '') }}">
                                @error('address')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="checkout__input-wrapper">
                                <label for="checkoutoptional">Apt, suite (optional)</label>
                                <input class="@error('optional') is-invalid @enderror" type="text"
                                    placeholder="Additional info" id="checkoutoptional" name="checkoutoptional"
                                    value="{{ old('address') ?? (auth()->user()->address ?? '') }}">
                                @error('optional')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="checkout__title__data">
                        <div class="left" onclick="openBlock('payment', 'paymentArrow')">
                            <h3 class="green-text">Payment method</h3>
                            <img id="paymentArrow" class="checkout__arrow"
                                src="{{ URL::asset('assets/svg/chevron-bottom.svg') }}" />
                        </div>
                    </div>

                    <div id="payment" class="checkout__button-grid" style="display: none;">
                        <div class="checkout__payment-option">
                            <input type="radio" name="checkout_payment" value="transaction" id="transaction" checked>
                            <label for="transaction">Bank Transaction</label>
                        </div>

                        <div class="checkout__payment-option">
                            <input type="radio" name="checkout_payment" value="cash" id="cash">
                            <label for="cash">Cash</label>
                        </div>
                    </div>

                    <div class="checkout__form__checkbox">
                        <input class="accent-main-green" type="checkbox" id="confirm" name="confirm">
                        <label class="green-text" for="confirm">Confirm terms etc</label>
                    </div>
                    <input type="submit" class="checkout__btn__last" value="Checkout" />
                </div>

            </form>
        </div>
        <div class="checkout__products-container">
            <div class="checkout__cart-overview">
                <h3 class="green-text">Cart overview</h3>
                <a class="thin-text" href="{{ route('cart') }}">Edit</a>
            </div>
            @foreach ($products as $product)
                @include('components.Cart-components.cart-item-card', ['controls' => false])
            @endforeach

            <div>@include('components.sum-up')</div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('js/checkout/checkout.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#checkoutphonecode");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/utils.js",
            separateDialCode: true,
            initialCountry: "lv",
        });
    </script>
@endpush
