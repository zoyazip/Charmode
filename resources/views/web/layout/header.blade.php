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
            @if(isset($subcat))
                <form id="search-form" action="{{ route('filter', ['subcat' => $subcat]) }}" method="GET" class="navbar__search-container">
            @else
                <form id="search-form" action="{{ route('filter') }}" method="GET" class="navbar__search-container">
            @endif
                {{-- all the hidden fields for filter --}}
                <input type="hidden" id="sort_by_form" name="sort_by" value="{{ old('sort_by', $data['sort_by'] ?? '') }}">
                <input type="hidden" id="sort_order_form" name="sort_order" value="{{ old('sort_order', $data['sort_order'] ?? '') }}">
                <input type="hidden" id="min_price_form" name="min_price" value="{{ old('min_price', $data['min_price'] ?? '') }}">
                <input type="hidden" id="max_price_form" name="max_price" value="{{ old('max_price', $data['max_price'] ?? '') }}">
                <input type="hidden" id="min_width_form" name="min_width" value="{{ old('min_width', $data['min_width'] ?? '') }}">
                <input type="hidden" id="max_width_form" name="max_width" value="{{ old('max_width', $data['max_width'] ?? '') }}">
                <input type="hidden" id="min_height_form" name="min_height" value="{{ old('min_height', $data['min_height'] ?? '') }}">
                <input type="hidden" id="max_height_form" name="max_height" value="{{ old('max_height', $data['max_height'] ?? '') }}">
                <input type="hidden" id="min_depth_form" name="min_depth" value="{{ old('min_depth', $data['min_depth'] ?? '') }}">
                <input type="hidden" id="max_depth_form" name="max_depth" value="{{ old('max_depth', $data['max_depth'] ?? '') }}">
                <input type="hidden" id="colors_form" name="colors" value="{{ old('colors', implode(',', $data['colors'] ?? [])) }}">
                <input type="hidden" id="is_available_form" name="is_available" value="{{ old('is_available', $data['is_available'] ?? '') }}">
                <input type="hidden" id="is_discount_form" name="is_discount" value="{{ old('is_discount', $data['is_discount'] ?? '') }}">
                <input type="hidden" id="free_delivery_form" name="free_delivery" value="{{ old('free_delivery', $data['free_delivery'] ?? '') }}">
                <input
                    name="search"
                    class="navbar__search-text"
                    type="text"
                    placeholder="Find your cheapest luxury brand..."
                    value="{{ old('search', $data['search'] ?? '') }}"/>
                <button type="submit" class="navbar__search-icon-btn">
                    <img class="navbar__search-icon" src="{{ URL::asset('assets/svg/search-icon.svg') }}" alt="Search" />
                </button>
            </form>

            <div class="navbar__icons">
                <a href="{{ url('cart') }}" class="navbar__cart-icon relative">
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
                            <img src="{{ URL::asset('assets/svg/orders.svg') }}" alt="orders">
                            My Orders
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
        <ul class="navbar__links cursor-pointer">
            @foreach ($categories as $index => $category)
                <li id="desktop-nav-{{ $index }}" class="desktop-nav-container navbar__link-container relative">
                    <div class="desktop-nav flex gap-2">
                        <div>
                            <h4 class="md:text-[16px]">{{ $category->name }}</h4>
                        </div>
                        <div class="cat-expand-sign flex flex-col">
                            <h4>
                                @if ($category->subcategories->isNotEmpty())
                                    +
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="pt-1">
                        <div
                            class="desktop-subcat absolute left-2 z-[999] hidden flex-col bg-white rounded-xl p-2 {{ $category->subcategories && $category->subcategories->isNotEmpty() ? 'md:bg-white drop-shadow-lg' : ' ' }}">
                            @if ($category->subcategories && $category->subcategories->isNotEmpty())
                                @foreach ($category->subcategories as $subcategory)

                                    <a href="{{ route('filter', ['subcat'=> $subcategory->id]) }}" class="inline-block hover:bg-main-green hover:text-white px-4 py-2 rounded-xl md:bg-white transition-all">{{ $subcategory->name }}</a>

                                @endforeach
                            @endif
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>

        <div class="navbar__links-mobile">
            <ul class="navbar__links-mobile__categories">
                @foreach ($categories as $index => $category)
                    <div class="nav-category-link flex items-center p-2">
                        <li class="navbar__link-container"><span class="text-xl">{{ $category->name }}</span></li>
                        <h4 class="nav-dd text-xl">
                            @if ($category->subcategories->isNotEmpty())
                                +
                            @endif
                        </h4>
                    </div>
                    <div id="sub-category-{{ $index }}"
                        class="navbar__links-mobile__subcategories hidden {{ $category->subcategories && $category->subcategories->isNotEmpty() ? 'py-2' : '' }}">
                        @if ($category->subcategories && $category->subcategories->isNotEmpty())
                            @foreach ($category->subcategories as $index => $subcategory)

                                <a href="{{ route('filter', ['subcat'=> $subcategory->id]) }}" class="navbar__link-container text-lg"> -> {{ $subcategory->name }}</a>

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
        // Mobile

        document.addEventListener('DOMContentLoaded', function() {
            const categories = document.querySelectorAll('.nav-category-link');
            let currentlyOpenSubcat = null;
            let currentlyOpenNavDD = null;

            categories.forEach((element, idx) => {
                const subCat = document.querySelector(`#sub-category-${idx}`)
                const navDD = element.querySelector('.nav-dd')

                if (!subCat || subCat.children.length === 0) {
                    navDD.textContent = ''
                }

                element.addEventListener('click', (e) => {
                    // Close the previously open sub-category if it exists and is not the current one
                    if (currentlyOpenSubcat && currentlyOpenSubcat !== subCat) {
                        currentlyOpenSubcat.classList.toggle('hidden')
                        if (currentlyOpenNavDD) {
                            currentlyOpenNavDD.textContent = ''
                        }
                    }

                    // Check if sub-category exists
                    if (subCat) {
                        // Toggle the visibility of the sub-category
                        subCat.classList.toggle('hidden')

                        // Toggle the text content between + and -
                        if (subCat.children.length !== 0) {
                            if (navDD.textContent === '-') {
                                navDD.textContent = '+'
                            } else {
                                navDD.textContent = '-'
                            }
                        }

                        // Update the currently open sub-category and navDD
                        currentlyOpenSubcat = subCat.classList.contains('hidden') ? null : subCat
                        currentlyOpenNavDD = navDD.textContent === '+' ? null : navDD
                    }
                })
            })
        })


        // Desktop
        const desktopNav = document.querySelectorAll('.desktop-nav-container')

        desktopNav.forEach((element, idx) => {
            const subCat = element.querySelector('.desktop-subcat')

            let isMouseOverSubcat = false

            element.addEventListener('mouseover', () => {
                subCat.classList.remove('hidden')
            })

            element.addEventListener('mouseout', () => {
                if (!isMouseOverSubcat) {
                    subCat.classList.add('hidden')
                }
            })

            subCat.addEventListener('mouseover', () => {
                isMouseOverSubcat = true
                subCat.classList.remove('hidden')
            })

            subCat.addEventListener('mouseout', () => {
                isMouseOverSubcat = false
                subCat.classList.add('hidden')
            })
        })
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
