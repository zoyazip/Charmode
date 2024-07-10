<div class="inner-container">
	<div class="navbar">
		<div class="navbar__top">
			<img class="navbar__menu" src="assets/svg/burger-menu-icon.svg" alt="Logo" />
			<img class="navbar__logo" src="assets/svg/logo.svg" alt="Logo" />
			<div class="navbar__search-container">
				<input
					class="navbar__search-text"
					type="text"
					placeholder="Find your most cheapest luxury brand..."
				/>
				<img
					class="navbar__search-icon"
					src="assets/svg/search-icon.svg"
					alt="Search"
				/>
			</div>
			<div class="navbar__icons">
				<img src="assets/svg/shopping-basket.svg" alt="Cart" />
				<img src="assets/svg/user.svg" alt="User" />
			</div>
		</div>
		<div class="navbar__links">
			<div class="navbar__link-container navbar--active">
				<a href="#home">Living room</a>
			</div>
			<div class="navbar__link-container">
				<a href="#about">Bathroom</a>
			</div>
			<div class="navbar__link-container">
				<a href="#services">Kitchen</a>
			</div>
			<div class="navbar__link-container">
				<a href="#products">Bedroom</a>
			</div>
			<div class="navbar__link-container">
				<a href="#contact">Foyer</a>
			</div>
			{{-- <!-- Commented out dynamic category links -->
			<!-- @foreach($categories as $category)
				<div class="navbar__link-container"><a href="#{{ strtolower($category->category) }}">{{ $category->category }}</a></div>
			@endforeach --> --}}
		</div>
		<div class="navbar__bottom-search">
			<input
				class="navbar__search-text"
				type="text"
				placeholder="Find your most cheapest luxury brand..."
			/>
			<img class="navbar__search-icon" src="assets/svg/search-icon.svg" alt="Search" />
		</div>
	</div>
</div>
