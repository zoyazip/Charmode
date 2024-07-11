@extends('layouts.main')

@section('title', 'Checkout page')

@section('content')
    <div class="container">
        <div class="checkout__container">
            <form method="POST" action="/to_checkout">
                @csrf
            <div class="checkout__container__div">
                <div class="checkout__title__data">
                    <div class="left">
                        <h3 class="green-text">Client Data</h3>
                        <img onclick="changeDataArrow('checkout__form', 'clientDataArrow')" id="clientDataArrow" class="close__arrow" src="assets/svg/arrow.svg"/>
                    </div>
                    <div class="right">
                        <h6 class="thin-text">Have account?</h6>
                        <a href="#" class="underline green-text">Login</a>
                    </div>
                </div>
                <div id="checkout__form" class="checkout__form hidden__div">
                    <div class="checkout__input__row">
                        {{-- <input class="checkout__name__input @error('name') is-invalid @enderror" placeholder="Name" type="text" id="name" name="name" value="{{ old('name') }}">
                        <input class="checkout__surname__input" placeholder="Surname" type="text" id="surname" name="surname" value="">
                        <input class="checkout__phone__input" placeholder="Tel." type="text" id="tel" name="tel" value=""> --}}
                        
                            <div class="checkout__name__input">
                                <input class="@error('name') is-invalid @enderror" placeholder="Name" type="text" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div  class="checkout__surname__input">
                                <input class="@error('surname') is-invalid @enderror" placeholder="Surname" type="text" id="surname" name="surname" value="">
                                @error('surname')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div  class="checkout__phone__input">
                                <input class="@error('phone') is-invalid @enderror" placeholder="Tel." type="text" id="tel" name="tel" value="">
                                @error('phone')
                                    <p class="checkout__error">{{ $message }}</p>
                                @enderror
                            </div>

                    </div>
                    <input placeholder="Email" type="text" id="email" name="email" value="">
                    <input placeholder="City" type="text" id="city" name="city" value="">
                    <input placeholder="Address" type="text" id="address" name="address" value="">
                    <div class="checkout__form__checkbox">

                        <div><input type="checkbox" id="bussiness" name="bussiness" value=""></div>
                            <div><label for="" class="green-text">Bussiness client paper</label></div>
                    </div>
                    <textarea placeholder="Comment" type="text" id="comment" name="comment" value=""></textarea>
                    
                </div>
                <div class="checkout__title">
                    <h3 class="green-text">Delivery Data</h3>
                    <img onclick="changeDataArrow('delivery__container', 'deliveryDataArrow')" id="deliveryDataArrow" class="close__arrow" src="assets/svg/arrow.svg"/>
                </div>
                <div id="delivery__container" class="delivery__container hidden__div">
                    <div class="delivery__buttons">
                        <button id="dpdBtn" onclick="showDelivery('dpd')" class="dpd checkout__btn">DPD</button>
                        <button onclick="showDelivery('omniva')" class="checkout__btn omniva">Omniva</button>
                        <button onclick="showDelivery('pasts')" class="checkout__btn pasts">Pasts</button>
                    </div>
                    <div id="dpdSelect" class="visible__div">
                        <select class="green-text delivery__select">
                            <option class="option selected-option">1</option>
                            <option class="option">2</option>
                            <option class="option">3</option>
                        </select>
                    </div>
                    <div id="omnivaSelect" class="hidden__div">
                        <select class="green-text delivery__select">
                            <option class="option selected-option">1</option>
                            <option class="option">2</option>
                            <option class="option">3</option>
                        </select>
                    </div>
                </div>
                <div class="checkout__title">
                    <h3 class="green-text">Payment method</h3>
                    <img onclick="changeDataArrow('paymentDiv', 'paymentDataArrow')" id="paymentDataArrow" class="close__arrow" src="assets/svg/arrow.svg"/>
                </div>
                <div id="paymentDiv" class="btn-grid hidden__div">
                    <button id="cashBtn" class="checkout__btn">Cash</button>
                    <button class="checkout__btn">Bank Transaction</button>
                    <button class="checkout__btn">Swedbank</button>
                    <button class="checkout__btn">Citadele</button>
                    <button class="checkout__btn">Swedbank</button>
                    <button class="checkout__btn">Luminor</button>
                </div>
                <div class="checkout__form__checkbox">

                    <div><input type="checkbox" id="confirm" name="confirm" value=""></div>
                        <div><label class="green-text" for="">Confirm terms etc</label></div>
                </div>
                <input type="submit" class="checkout__btn__last" value="Checkout">
                {{-- <button class="checkout__btn__last">Checkout </button> --}}
            </div>
            <div class="checkout__container__div">
                {{-- <div class="checkout__overview">
                    <h3 class="green-text">Cart overview</h3>
                    <a href="#" class="green-text">Edit</a>
                </div> --}}
            </div>
            {{-- @include('') --}}
        </form>
        </div>
    </div>
    <script src="js/checkout/checkout.js"></script>
@endsection