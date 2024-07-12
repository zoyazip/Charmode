@extends('layouts.main')

@section('title', 'Registration page')

@section('content')
    <div class="registration__container">
        <h3>Registration</h3>
        <form  class="registration__form" method="POST" action="/register">
            @csrf
            @if($errors->any())
                <p class="register__error">Registration failed</p>
            @endif
            <div class="register__full_name__input">
                <input class="register__input @error('full_name') is-invalid @enderror" placeholder="Full name" type="text" id="full_name" name="nafull_nameme" value="{{ old('full_name') }}">
                @error('full_name')
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
                <input class="register__input @error('password') is-invalid @enderror" placeholder="Password*" type="password" id="password" name="firstPassword" value="{{ old('firstPassword') }}">
                @error('password')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__re-password__input">
                <input class="register__input @error('re-password') is-invalid @enderror" placeholder="Re-type password*" type="password" id="re-password" name="re-password" value="{{ old('re-password') }}">
                @error('re-password')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__phone__input">
                <input class="register__input @error('phone') is-invalid @enderror" placeholder="Phone" type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__city__input">
                <input class="register__input @error('city') is-invalid @enderror" placeholder="City" type="text" id="city" name="city" value="{{ old('city') }}">
                @error('city')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__address__input">
                <input class="register__input @error('address') is-invalid @enderror" placeholder="Address" type="text" id="address" name="address" value="{{ old('address') }}">
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
    <script src="js/register/register.js"></script>
@endsection