<div class="main-container">
    <div class="inner-container">
        <div class="navbar">
            <div class="navbar__top">
                <img class="navbar__logo" src="assets/svg/logo.svg"></img>
                <div class="navbar__search-container">
                    <input type="text" placeholder="Find your most cheapest luxury brand...">
                    <img class="navbar__search-icon" src="assets/svg/search-icon.svg"></img>
                </div>
                <div class="navbar__icons">
                    <img src="assets/svg/shopping-basket.svg" alt="Cart">
                    <img src="assets/svg/user.svg" alt="User">
                </div>
            </div>
            <div class="navbar__links">
                <div class="navbar__link-container navbar--active"><a href="#home">Homezzz</a></div>
                <div class="navbar__link-container text-black"><a href="#about" >About</a></div>
                <div class="navbar__link-container"><a href="#services">Services</a></div>
                <div class="navbar__link-container"><a href="#products">Products</a></div>
                <div class="navbar__link-container"><a href="#contact">Contact</a></div>
                {{-- @foreach($categories as $category)
                    <div class="navbar__link-container"><a href="#{{ strtolower($category->category) }}">{{ $category->category }}</a></div>
                @endforeach --}}
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script  src="{{ URL::asset('js/header/header_ajax.js') }}"></script>
@endpush --}}
{{-- todo: connect this script --}}
