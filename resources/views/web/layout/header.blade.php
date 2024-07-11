<div class="inner-container">
    <div class="navbar">
        <div class="navbar__top">

            <div class="navbar__burger-container">
                <input class="navbar__burger-checkbox" type="checkbox" name="" id="" />
                <div class="navbar__burger-lines">
                    <span class="navbar__burger-line1 navbar__burger-line"></span>
                    <span class="navbar__burger-line2 navbar__burger-line"></span>
                    <span class="navbar__burger-line3 navbar__burger-line"></span>
                </div>
            </div>

            <img class="navbar__logo" src="assets/svg/logo.svg" alt="Logo" />
            <div class="navbar__search-container">
                <input class="navbar__search-text" type="text" placeholder="Find your cheapest luxury brand..." />
                <img class="navbar__search-icon" src="assets/svg/search-icon.svg" alt="Search" />
            </div>
            <div class="navbar__icons">
                <img src="assets/svg/shopping-basket.svg" alt="Cart" />
                <img src="assets/svg/user.svg" alt="User" />
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
        {{-- <!-- Commented out dynamic category links -->
			<!-- @foreach ($categories as $category)
				<div class="navbar__link-container"><a href="#{{ strtolower($category->category) }}">{{ $category->category }}</a></div>
			@endforeach --> --}}
    </div>
    <div class="navbar__bottom-search">
        <input class="navbar__search-text" type="text" placeholder="Find your luxury brand..." />
        <img class="navbar__search-icon" src="assets/svg/search-icon.svg" alt="Search" />
    </div>
</div>
</div>
