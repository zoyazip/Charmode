<style>
    .wave {
        animation-name: waving-hand;

        animation-duration: 2.5s;
        font-size: 32px;

        animation-iteration-count: infinite;

        transform-origin: 70% 70%;

        display: inline-block;
    }

    @keyframes waving-hand {
        0% {
            transform: rotate(0.0deg);
        }

        10% {
            transform: rotate(14.0deg);
        }

        20% {
            transform: rotate(-8.0deg);
        }

        30% {
            transform: rotate(14.0deg);
        }

        40% {
            transform: rotate(-4.0deg);
        }

        50% {
            transform: rotate(10.0deg);
        }

        60% {
            transform: rotate(0.0deg);
        }

        100% {
            transform: rotate(0.0deg);
        }
    }
</style>

    <div
        class="login-container max-w-[500px] w-[90%] h-screen fixed right-0 top-0 transition-all flex justify-center items-center translate-x-full bg-white">
        <div class="login-inner-container w-3/4 flex flex-col gap-4">
            <div class="login-greetings flex items-center justify-between">
                <div class="greet"><h2 class="font-bold text-3xl inline-block">Hi <span class="wave">👋🏻</span></h2></div>
                <div class="close-login cursor-pointer"><img src="assets/svg/cross.svg" /></div>
            </div>
            <form class="flex flex-col gap-4">
                <div class="email-field">
                    <input
                        class="w-full p-3 bg-inherit text-green-900 outline-none border-b border-b-green-900 placeholder:text-green-800"
                        type="email" placeholder="Your email" required />
                </div>
                <div class="password-field">
                    <input
                        class="w-full p-3 bg-inherit text-green-900 outline-none border-b border-b-green-900 placeholder:text-green-800"
                        type="password" placeholder="Your password" required />
                </div>
                <div class="remember-checkbox flex items-center gap-2">
                    <input type="checkbox" class="checked:accent-green-500 " />
                    <label class="text-main-green">Remember me</label>
                </div>
                <div class="login-form-btn">
                    <input type="submit" value="Login"
                        class="w-full border border-green-900 text-green-900 py-4 rounded-lg hover:bg-green-400 hover:border-opacity-0 transition-all cursor-pointer" />
                </div>
            </form>
            <div class="registration-form w-full gap-6 flex flex-col items-center">
                <p class="or-text">Or</p>
                <div class="registration-btn w-full">
                    <a class="bg-green-300 flex items-center justify-center rounded-lg w-full py-4 text-green-900 hover:bg-green-400 transition-all cursor-pointer">Registration</a>
                </div>
            </div>

        </div>


    </div>