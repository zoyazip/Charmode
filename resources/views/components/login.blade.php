@push('styles')
    <link rel="stylesheet" href="{{URL::asset('css/header/greetings.css')}}">
@endpush

<div
    class="login-container max-w-[500px] w-[90%] h-screen fixed z-50 right-0 top-0 transition-all flex justify-center items-center translate-x-full bg-white">
    <div class="login-inner-container w-3/4 flex flex-col gap-4">
        <div class="login-greetings flex items-center justify-between">
            <div class="greet">
                <h2 class="font-bold text-3xl inline-block">Hi <span class="wave">👋🏻</span></h2>
            </div>
            <div class="close-login cursor-pointer"><img src="{{ URL::asset('assets/svg/cross.svg') }}" alt="✖"/></div>
        </div>

        <form class="flex flex-col gap-4" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="email-field">
                <input
                    class="w-full p-3 bg-inherit text-green-900 outline-none border-b border-b-green-900 placeholder:text-green-800"
                    type="email" placeholder="Your email" name="email" value="{{ old('email') }}" required />

                @error('email')
                    <script defer>
                        const loginMenu = document.querySelector('.login-container')
                        loginMenu.style.transform = 'translateX(0px)'
                    </script>
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="password-field">
                <input
                    class="w-full p-3 bg-inherit text-green-900 outline-none border-b border-b-green-900 placeholder:text-green-800"
                    type="password" placeholder="Your password" name="password" required />

                @error('password')
                    <script defer>
                        const loginMenu = document.querySelector('.login-container')
                        loginMenu.style.transform = 'translateX(0px)'
                    </script>
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="remember-checkbox flex items-center gap-2">
                <input type="checkbox" class="checked:accent-green-500 " name="remember_me" value="true" id="remember_me"/>
                <label class="text-main-green select-none" for="remember_me">Remember me</label>
            </div>
            <div class="login-form-btn">
                <input type="submit" value="Login"
                    class="w-full border border-green-900 text-green-900 py-4 rounded-lg hover:bg-green-400 hover:border-opacity-0 transition-all cursor-pointer" />
            </div>
        </form>

        <div class="registration-form w-full gap-6 flex flex-col items-center">
            <p class="or-text">Or</p>
            <div class="registration-btn w-full">
                <a href="{{ route('registration') }}"
                    class="bg-main-green flex items-center justify-center rounded-lg w-full py-4 text-white hover:bg-green-400 transition-all cursor-pointer">Registration</a>
            </div>
        </div>
    </div>
</div>
