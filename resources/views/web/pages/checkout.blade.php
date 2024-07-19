@extends('layouts.main')

@section('title', 'Checkout page')
@push('styles')
    {{-- item card styler --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/cart-item-card.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/cart/sum-up.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/checkout/checkout.css') }}" />

@endpush


@section('content')
    <div class="bigger-container">
        <div class="checkout__container">
            <div class="checkout__whole-form">
                <form method="POST" action="/to_checkout">
                    @csrf
                    <div class="container-tmp">
                        <div class="checkout__container__div">
                            <div class="checkout__title__data">
                                <div class="left">
                                    <h3 class="green-text">Client Data</h3>
                                    <img onclick="changeDataArrow('checkout__form', 'clientDataArrow')" id="clientDataArrow"
                                        class="close__arrow w-4" src="assets/svg/arrow-dd.svg" />
                                </div>
                                @guest
                                    <div class="right">
                                        <h6 class="thin-text">Have account?</h6>
                                        <button class="login-link-checkout" class="underline green-text login-btn" type="button">Login</button>
                                    </div>
                                @endguest
                            </div>
                            <div id="checkout__form" class="checkout__form hidden__div">
                                <input class="@error('checkoutemail') is-invalid @enderror" placeholder="Email*"
                                    type="text" id="email" name="checkoutemail"
                                    value="{{ old('checkoutemail') ?? (auth()->user()->email ?? '') }}">
                                @error('checkoutemail')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                                <input class="@error('city') is-invalid @enderror" placeholder="City*" type="text"
                                    id="city" name="city" value="{{ old('city') ?? (auth()->user()->city ?? '') }}">
                                @error('city')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                                <input class="@error('address') is-invalid @enderror" placeholder="Address*" type="text"
                                    id="address" name="address"
                                    value="{{ old('address') ?? (auth()->user()->address ?? '') }}">
                                @error('address')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                                {{-- @endif --}}
                                <textarea placeholder="Comment" type="text" id="comment" name="comment" value="{{ old('comment') }}" class="mt-10"></textarea>
                            </div>
                            <div class="checkout__title">
                                <h3 class="green-text">Delivery Data</h3>
                                <img onclick="changeDataArrow('delivery__container', 'deliveryDataArrow')"
                                    id="deliveryDataArrow" class="close__arrow w-4"
                                    src="{{ URL::asset('assets/svg/arrow-dd.svg') }}" />
                            </div>
                            <div id="delivery__container" class="delivery__container hidden__div">
                                <div class="delivery__buttons">
                                    <select value="{{ old('deliveryMethod') }}" onchange="showDelivery(this.value)"
                                        class="green-text delivery__select" name="deliveryMethod">
                                        <option value="dpd" class="option">DPD</option>
                                        <option value="omniva" class="option">Omniva</option>
                                        <option value="pasts" class="option">Pasts</option>
                                    </select>
                                </div>
                                <div id="dpdSelect" class="visible__div">
                                    <select value="{{ old('deliveryPlace_dpd') }}" name="deliveryPlace_dpd"
                                        class="green-text delivery__select">
                                        <option class="option selected-option">DPD pakomāts Rīgā</option>
                                        <option class="option">DPD pakomāts Liepājā</option>
                                        <option class="option">DPD pakomāts Kuldīgā</option>
                                    </select>
                                </div>
                                <div id="omnivaSelect" class="hidden__div">
                                    <select value="{{ old('deliveryPlace_omniva') }}" name="deliveryPlace_omniva"
                                        class="green-text delivery__select">
                                        <option class="option selected-option">Omniva pakomāts Rīgā</option>
                                        <option class="option">Omniva pakomāts Daugavpilī</option>
                                        <option class="option">Omniva pakomāts Ventspilī</option>
                                    </select>
                                </div>
                            </div>
                            <div class="checkout__title">
                                <h3 class="green-text">Payment method</h3>
                                <img onclick="changeDataArrow('paymentDiv', 'paymentDataArrow')" id="paymentDataArrow"
                                    class="close__arrow w-4" src="{{ URL::asset('assets/svg/arrow-dd.svg') }}" />
                            </div>
                            <div id="paymentDiv" class="btn-grid hidden__div">
                                <select value="{{ old('paymentMethod') }}" class="green-text delivery__select"
                                    name="paymentMethod">
                                    <option name="cash" class="option">Cash</option>
                                    <option name="bank_transaction" class="option">Bank Transaction</option>
                                    <option name="swedbank" class="option">Swedbank</option>
                                    <option name="citadele" class="option">Citadele</option>
                                    <option name="seb" class="option">SEB</option>
                                    <option name="luminor" class="option">Luminor</option>
                                </select>
                            </div>
                            <div class="checkout__form__checkbox">
                                <div><input class="accent-main-green" type="checkbox" id="confirm" name="confirm" value=""></div>
                                <div><label class="green-text" for="confirm">Confirm terms etc</label></div>
                            </div>
                            <input type="submit" class="checkout__btn__last" value="Checkout" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="item-Container">
                {{-- @include('components/cart-item-card')
                @include('components/sum-up') --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('js/checkout/checkout.js') }}"></script>
@endpush
