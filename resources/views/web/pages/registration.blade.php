@extends('layouts.main')

@section('title', 'Registration page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/pages/registration/registration.css') }}">
@endpush

@section('content')
    <div class="registration__container">
        <div class="registration__upper-container">
            <h3>Registration</h3>

            <div class="register__pointers">
                <span class="register__section-pointer"></span>
                <span class="register__section-pointer inactive"></span>
            </div>

            @if ($errors->has('registration_failed'))
                <p class="register__error">{{ $errors->first('registration_failed') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form class="registration__form" method="POST" action="/register">
            @csrf
            <div class="register__essentials-container active">
                <div class="register__fullname-container">
                    <div class="register__name__input">
                        <input class="register__input @error('name') is-invalid @enderror" placeholder="Name" type="text"
                            id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="register__error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="register__surname__input">
                        <input class="register__input @error('surname') is-invalid @enderror" placeholder="Surname"
                            type="text" id="surname" name="surname" value="{{ old('surname') }}">
                        @error('surname')
                            <p class="register__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="register__email__input">
                    <input class="register__input @error('email') is-invalid @enderror" placeholder="Email*" type="email"
                        id="email" name="email_address" value="{{ old('email_address') }}">
                    @error('email_address')
                        <p class="register__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="register__password__input">
                    <input class="register__input @error('password') is-invalid @enderror" placeholder="Password*"
                        type="password" id="password" name="first_password" value="{{ old('first_password') }}">
                    @error('first_password')
                        <p class="register__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="register__re-password__input">
                    <input class="register__input @error('re-password') is-invalid @enderror"
                        placeholder="Re-type password*" type="password" id="re-password" name="re-password"
                        value="{{ old('re-password') }}">
                    @error('re-password')
                        <p class="register__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="register__next-stage-container">
                    <button class="register__next-stage">Next stage <img src="{{ URL::asset('assets/svg/arrow.svg') }}"
                            alt="→"></button>
                </div>
            </div>

            <div class="register__additional-container">
                <div class="register__phone__input">
                    <input class="register__input @error('phone_number') is-invalid @enderror" placeholder="Phone*"
                        type="tel" id="phone" name="phone_number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <p class="register__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="register__city__input">
                    <input class="register__input @error('city') is-invalid @enderror" placeholder="City" type="text"
                        id="city" name="city" value="{{ old('city') }}">
                    @error('city')
                        <p class="register__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="register__address__input">
                    <input class="register__input @error('address') is-invalid @enderror" placeholder="Address"
                        type="text" id="address" name="address" value="{{ old('address') }}">

                    @error('address')
                        <p class="register__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="register__terms-container">
                    <div class="register__checkbox">
                        <input id="registerCheckbox" onchange="enableLoginBtn()" type="checkbox"
                            class="checked:accent-main-green">
                        <label for="registerCheckbox">Terms and conditions</label>
                    </div>
                    <a href="/terms">Read more</a>
                </div>


                <div class="register__btn__div">
                    <input id="registerBtn" disabled class="register__btn" type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('js/registration/registration.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the element
            const first = document.querySelector(".register__essentials-container");
            const second = document.querySelector(".register__additional-container");

            const inactive = document.querySelector('.register__section-pointer.inactive');
            const button_next = document.querySelector(".register__next-stage");

            // Add click event listener
            button_next.addEventListener("click", function(e) {
                e.preventDefault()
                // Toggle the active class on click
                first.classList.remove("active");
                second.classList.add("active");

                inactive.classList.remove("inactive");
            });
        });
    </script>
@endpush
