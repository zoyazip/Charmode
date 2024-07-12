@extends('layouts.main')

@section('title', 'Checkout page')

@section('content')
    {{-- <div class="container"> --}}
    <div class="registration__container">
        <h3>Registration</h3>
        <form  class="registration__form" method="POST" action="/register">
            @csrf
            <div class="register__name__input">
                <input class="register__input @error('name') is-invalid @enderror" placeholder="Name*" type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__surname__input">
                <input class="register__input @error('surname') is-invalid @enderror" placeholder="Surname*" type="text" id="surname" name="surname" value="{{ old('surname') }}">
                @error('surname')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__email__input">
                <input class="register__input @error('email') is-invalid @enderror" placeholder="Email*" type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__password__input">
                <input class="register__input @error('password') is-invalid @enderror" placeholder="Password*" type="password" id="password" name="password" value="{{ old('password') }}">
                @error('password')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__re-password__input">
                <input class="register__input @error('re-password') is-invalid @enderror" placeholder="Re-type password*" type="re-password" id="re-password" name="re-password" value="{{ old('re-password') }}">
                @error('re-password')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__phone__input">
                <input class="register__input @error('phone') is-invalid @enderror" placeholder="Phone*" type="number" id="phone" name="phone" value="{{ old('citphoney') }}">
                @error('phone')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__city__input">
                <input class="register__input @error('city') is-invalid @enderror" placeholder="City*" type="text" id="city" name="city" value="{{ old('city') }}">
                @error('city')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__address__input">
                <input class="register__input @error('address') is-invalid @enderror" placeholder="Address*" type="text" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__checkbox">
                <input id="registerCheckbox" onchange="enableLoginBtn()" type="checkbox" >
                <label>Terms and conditions</label>
            </div>
            <div class="register__btn__div">
                <input id="registerBtn" disabled class="register__btn" type="submit" value="Register">
                <a href="#" class="login__a">Login</a>
            </div>
        </form>
    </div>
    {{-- </div> --}}
    <script src="js/register/register.js"></script>
@endsection