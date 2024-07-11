function onResize() {
    const width = window.innerWidth;
    const navbarLinksMobile = document.querySelector(".navbar__links-mobile");
    const burgerCheckbox = document.querySelector(".navbar__burger-checkbox");
    console.log("close???");

    if (width > 768) {
        console.log("close");
        burgerCheckbox.checked = false;
        navbarLinksMobile.style.display = "none";
    }
}

window.addEventListener("resize", onResize);

function toggleDropdown() {
    console.log("hello");

    const burgerCheckbox = document.querySelector(".navbar__burger-checkbox");
    const navbarLinksMobile = document.querySelector(".navbar__links-mobile");

    // if (burgerCheckbox && navbarLinksMobile) {
    burgerCheckbox.addEventListener("change", function () {
        if (this.checked) {
            navbarLinksMobile.style.display = "flex";
        } else {
            navbarLinksMobile.style.display = "none";
        }
    });
    // }
}
