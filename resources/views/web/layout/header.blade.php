<div class="inner-container">
    <div class="navbar">
        <div class="navbar__top">

            <div class="navbar__burger-container">
                <input class="navbar__burger-checkbox" onclick="toggleDropdown()" type="checkbox" />
                <div class="navbar__burger-lines">
                    <span class="navbar__burger-line1 navbar__burger-line"></span>
                    <span class="navbar__burger-line2 navbar__burger-line"></span>
                    <span class="navbar__burger-line3 navbar__burger-line"></span>
                </div>
            </div>
            <a href="/">
                <img class="navbar__logo" src="{{ URL::asset('assets/svg/logo.svg') }}" alt="Logo" />
            </a>
            <div class="navbar__search-container">
                <input class="navbar__search-text" type="text" placeholder="Find your cheapest luxury brand..." />
                <img class="navbar__search-icon" src="{{ URL::asset('assets/svg/search-icon.svg') }}" alt="Search" />
            </div>
            <div class="navbar__icons">
                <a href="cart" class="navbar__cart-icon">
                    <img src="{{ URL::asset('assets/svg/shopping-basket.svg') }}" alt="Cart" />
                </a>
                @auth
                    <button class="navbar__auth-container" onclick="toggleActive()">
                        <span>{{substr(Auth::user()->email, 0, 1)}}</span>
                    </button>

                    <div class="navbar__auth-drop-container">
                        <div class="navbar__auth-option">
                            <b>Signed in as: </b>
                            <br>
                            {{Auth::user()->email}}
                        </div>
                        <hr class="navbar__auth-separator">

                        <a class="navbar__auth-option cart" href="cart">
                            <img src="{{ URL::asset('assets/svg/shopping-basket.svg') }}" alt="Cart" />
                            Cart
                        </a>
                        <a class="navbar__auth-option" href="wishlist">
                            <img src="{{URL::asset('assets/svg/heart.svg')}}" alt="heart">
                            Liked
                        </a>
                        <a class="navbar__auth-option" href="settings">
                            <img src="{{URL::asset('assets/svg/settings.svg')}}" alt="settings">
                            Settings
                        </a>

                        {{-- <hr class="navbar__auth-separator"> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="navbar__auth-option">
                                <img src="{{URL::asset('assets/svg/log-out.svg')}}" alt="logout">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <img class="login-btn" src="{{ URL::asset('assets/svg/user.svg') }}" alt="User" />
                @endauth
            </div>
        </div>
        <div class="navbar__links">
            <a href="1" class="navbar__link-container">Living room</a>
            <a href="2" class="navbar__link-container">Bathroom</a>
            <a href="3" class="navbar__link-container">Kitchen</a>
            <a href="4" class="navbar__link-container">Bedroom</a>
            <a href="5" class="navbar__link-container">Foyer</a>
            <a href="1" class="navbar__link-container">Living room</a>
            <a href="2" class="navbar__link-container">Bathroom</a>
            <a href="3" class="navbar__link-container">Kitchen</a>
            <a href="4" class="navbar__link-container">Bedroom</a>
            <a href="5" class="navbar__link-container">Foyer</a>
            <a href="1" class="navbar__link-container">Living room</a>
            <a href="2" class="navbar__link-container">Bathroom</a>
            <a href="3" class="navbar__link-container">Kitchen</a>
            <a href="4" class="navbar__link-container">Bedroom</a>
            <a href="5" class="navbar__link-container">Foyer</a>
        </div>
        <div class="navbar__links-mobile">
            <div class="navbar__links-mobile__categories">
                <a href="1" class="navbar__link-container">Living room</a>
                <a href="2" class="navbar__link-container">Bathroom</a>
                <a href="3" class="navbar__link-container">Kitchen</a>
                <a href="4" class="navbar__link-container">Bedroom</a>
                <a href="5" class="navbar__link-container">Foyer</a>
            </div>
            <div class="navbar__links-mobile__subcategories">
                <a href="1" class="navbar__link-container">Tables</a>
                <a href="2" class="navbar__link-container">Chairs</a>
                <a href="3" class="navbar__link-container">Beds</a>
                <a href="4" class="navbar__link-container">Waredrobes</a>
            </div>
        </div>
        {{-- <!-- Commented out dynamic category links -->
			<!-- @foreach ($categories as $category)
				<div class="navbar__link-container"><a href="#{{ strtolower($category->category) }}">{{ $category->category }}</a></div>
			@endforeach --> --}}
    </div>
    <div class="navbar__bottom-search">
        <input class="navbar__search-text" type="text" placeholder="Find your luxury brand..." />
        <img class="navbar__search-icon" src="{{ URL::asset('assets/svg/search-icon.svg') }}" alt="Search" />
    </div>
</div>

@include('/components/login')

@push('scripts')
    <script src="{{ URL::asset('js/navbar.js') }}"></script>
    <script type="module" src="{{ URL::asset('js/draggable_strip.js') }}"></script>
    <script src="{{ URL::asset('js/header/login.js') }}"></script>
@endpush


@auth
    @push('scripts')

        <script defer>
            const dropdown = document.querySelector('.navbar__auth-drop-container')
            const toggleActive = () => {
                dropdown.classList.toggle("active")
            }
        </script>

    @endpush    
@endauth