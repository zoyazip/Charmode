@php
    $items = 33;
@endphp


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
                <a href="cart" class="navbar__cart-icon relative">
                    <img src="{{ URL::asset('assets/svg/shopping-basket.svg') }}" alt="Cart" />
                    @include('components/cart-counter-popup')
                </a>
                @auth
                    <button class="navbar__auth-container" onclick="toggleActive()">
                        <span>{{ substr(Auth::user()->email, 0, 1) }}</span>
                    </button>

                    <div class="navbar__auth-drop-container">
                        <div class="navbar__auth-option">
                            <b>Signed in as: </b>
                            <br>
                            {{ Auth::user()->email }}
                        </div>
                        <hr class="navbar__auth-separator">

                        <a class="navbar__auth-option cart" href="cart">
                            <img src="{{ URL::asset('assets/svg/shopping-basket.svg') }}" alt="Cart" />
                            Cart ({{ $items }})
                        </a>
                        <a class="navbar__auth-option" href="wishlist">
                            <img src="{{ URL::asset('assets/svg/heart.svg') }}" alt="heart">
                            Liked
                        </a>
                        <a class="navbar__auth-option" href="settings">
                            <img src="{{ URL::asset('assets/svg/settings.svg') }}" alt="settings">
                            Settings
                        </a>

                        {{-- <hr class="navbar__auth-separator"> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="navbar__auth-option">
                                <img src="{{ URL::asset('assets/svg/log-out.svg') }}" alt="logout">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <img class="login-btn" src="{{ URL::asset('assets/svg/user.svg') }}" alt="User" />
                @endauth
            </div>
        </div>

        <ul class="navbar__links">
            @foreach ($categories as $category)
                <li class="navbar__link-container">{{ $category->name }}</li>
            @endforeach
        </ul>

        <div class="navbar__links-mobile">
            <ul class="navbar__links-mobile__categories">
                @foreach ($categories as $index => $category)
                    <li class="navbar__link-container">{{ $category->name }} <span id>+</span></li>

                    <div class="navbar__links-mobile__subcategories">
                        @if ($category->subcategories && $category->subcategories->isNotEmpty())
                            @foreach ($category->subcategories as $subcategory)
                                <a href="" class="navbar__link-container">{{ $subcategory->name }}</a>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </ul>
        </div>

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

@push('scripts')
    <script>
        const 
    </script>
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
