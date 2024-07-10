@extends('layouts.main')

@section('title', 'Checkout page')

@section('content')
    <div class="container">
        <div class="checkout__container">
            <div class="checkout__container__div">
                <div class="checkout__title__data">
                    <div class="left">
                        <div><h3 class="green-text">Client Data</h3></div>
                        <span>V</span>
                    </div>
                    <div class="right">
                        <h6 class="thin-text">Have account?</h6>
                        <a href="#" class="green-text">Login</a>
                    </div>
                </div>
                <form class="checkout__form">
                    <div class="checkout__input__row">
                        <input placeholder="Name" type="text" id="name" name="name" value="">
                        <input placeholder="Surname" type="text" id="surname" name="surname" value="">
                        <input placeholder="Tel." type="text" id="tel" name="tel" value="">
                    </div>
                    <input placeholder="Email" type="text" id="email" name="email" value="">
                    <input placeholder="City" type="text" id="city" name="city" value="">
                    <input placeholder="Address" type="text" id="address" name="address" value="">
                    <div class="checkout__form__checkbox">

                        <div><input type="checkbox" id="bussiness" name="bussiness" value=""></div>
                            <div><label for="" class="green-text">Bussiness client paper</label></div>
                    </div>
                    <textarea placeholder="Comment" type="text" id="comment" name="comment" value=""></textarea>
                    
                </form>
                <div class="checkout__title">
                    <h3 class="green-text">Delivery Data</h3>
                    <span>V</span>
                </div>
                <div class="delivery__container">
                    <div class="delivery__buttons">
                        <button class="btn dpd">DPD</button>
                        <button class="btn omniva">Omniva</button>
                        <button class="btn pasts">Pasts</button>
                    </div>
                    <div>
                        <select class="green-text delivery__select">
                            <option class="option selected-option">1</option>
                            <option class="option">2</option>
                            <option class="option">3</option>
                        </select>
                    </div>
                    {{-- <div>
                        <select class="green-text delivery__select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div> --}}
                </div>
                <div class="checkout__title">
                    <h3 class="green-text">Payment method</h3>
                    <span>V</span>
                </div>
                <div class="btn-grid">
                    <button class="grid-btn">Cash</button>
                    <button class="grid-btn">Bank Transaction</button>
                    <button class="grid-btn">Swedbank</button>
                    <button class="grid-btn">Citadele</button>
                    <button class="grid-btn">Swedbank</button>
                    <button class="grid-btn">Luminor</button>
                </div>
                <div class="checkout__form__checkbox">

                    <div><input type="checkbox" id="confirm" name="confirm" value=""></div>
                        <div><label class="green-text" for="">Confirm terms etc</label></div>
                </div>
                <button class="checkout-btn">Checkout </button>
            </div>
            <div class="checkout__container__div">
                <div class="checkout__overview">
                    <h3 class="green-text">Cart overview</h3>
                    <a href="#" class="green-text">Edit</a>
                </div>
            </div>
            {{-- @include('') --}}
        </div>
    </div>
@endsection