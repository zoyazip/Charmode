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
            <form method="POST" action="{{ route('proceed') }}">
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
                            <label for="checkout_email">Email Address*</label>
                            <input class="@error('checkout_email') is-invalid @enderror" placeholder="Your email address"
                                type="text" id="checkout_email" name="checkout_email"
                                value="{{ old('checkout_email') ?? (auth()->user()->email ?? '') }}">

                            @error('checkoutemail')
                                <p class="checkout__error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="checkout__container-rowupper">
                            <div class="checkout__input-wrapper">
                                <label for="checkout_fullname">Full Name*</label>
                                <input type="text" name="checkout_fullname" id="checkout_fullname"
                                    value="{{ old('checkout_fullname') ?? (auth()->user()->full_name ?? '') }}"
                                    placeholder="Your name" class="@error('checkout_fullname') is-invalid @enderror">
                            </div>
                            <div class="checkout__input-wrapper">
                                <label for="checkout_phone">Phone Number*</label>
                                <input id="checkout_phone" required type="tel" value="{{ old('checkout_fullname') ?? (auth()->user()->phone ?? '') }}">
                            </div>
                        </div>

                        <div class="checkout__input-wrapper">
                            <label for="checkout_comment">Message</label>
                            <textarea placeholder="Enter text here..." type="text" id="checkout_comment" name="checkout_comment"
                                value="{{ old('checkout_comment') }}"></textarea>
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
                            <label for="checkout_country">Country/Region</label>
                            <input name="checkout_country" id="checkout_country" type="country" placeholder="Your country">
                        </div>

                        <div class="checkout__container-rowupper">
                            <div class="checkout__input-wrapper">
                                <label for="checkout_city">City*</label>
                                <input class="@error('checkout_city') is-invalid @enderror" placeholder="Your city"
                                    type="text" id="checkout_city" name="checkout_city"
                                    value="{{ old('checkout_city') ?? (auth()->user()->city ?? '') }}">

                                @error('checkout_city')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="checkout__input-wrapper">
                                <label for="checkout_zip">Zip code*</label>
                                <input class="@error('checkout_zip') is-invalid @enderror" placeholder="Your zip code"
                                    type="text" id="checkout_zip" name="checkout_zip"
                                    value="{{ old('checkout_zip') ?? (auth()->user()->address ?? '') }}">
                                @error('checkout_zip')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="checkout__container-rowupper">
                            <div class="checkout__input-wrapper">
                                <label for="checkout_address">Address*</label>
                                <input class="@error('checkout_address') is-invalid @enderror" placeholder="Your address"
                                    type="text" id="checkout_address" name="checkout_address"
                                    value="{{ old('checkout_address') ?? (auth()->user()->address ?? '') }}">
                                @error('checkout_address')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="checkout__input-wrapper">
                                <label for="checkout_optional">Apt, suite (optional)</label>
                                <input class="@error('checkout_optional') is-invalid @enderror" type="text"
                                    placeholder="Additional info" id="checkout_optional" name="checkout_optional"
                                    value="{{ old('checkout_optional') ?? (auth()->user()->address ?? '') }}">
                                @error('checkout_optional')
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
                        <input class="accent-main-green" type="checkbox" id="chekout_confirm" name="chekout_confirm">
                        <label class="green-text  @error('chekout_confirm') error @enderror" for="chekout_confirm">Confirm
                            terms and etc.</label>
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
        const input = document.querySelector("#checkout_phone");

        const initialCountry = @json($countryCode) || "lv"; // Default to "lv" if no country code is provided

        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/utils.js",
            separateDialCode: true,
            initialCountry: initialCountry,
            hiddenInput: function(telInputName) {
                return {
                    phone: "checkout_phonefull",
                    country: "checkout_countrycode"
                };
            }
        });
    </script>
@endpush
