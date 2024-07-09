<nav class="navbar">
    <div class="navbar-top">
        <img src="{{ URL::asset('assets/svg/logo.svg') }}"></img>
        <div class="search-container">
            <input type="text" placeholder="Find your cheapest luxury brand...">
        </div>
        <div class="navbar-icons">
            <img src="{{ URL::asset('assets/svg/shopping-basket.svg') }}" alt="Cart">
            <img src="{{ URL::asset('assets/svg/user.svg') }}" alt="User">
        </div>
    </div>
    <div class="navbar-links">
        <div class="link-container active"><a href="/">Home</a></div>
        <div class="link-container"><a href="about">About</a></div>
        <div class="link-container"><a href="services">Services</a></div>
        <div class="link-container"><a href="products">Products</a></div>
        <div class="link-container"><a href="contact">Contact</a></div>
    </div>
</nav>
