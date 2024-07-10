// public/js/navbar.js

document.addEventListener("DOMContentLoaded", (event) => {
    console.log("Navbar JS file loaded successfully!");

    // Toggle the burger menu
    const burgerCheckbox = document.querySelector(".navbar__burger-checkbox");
    const navbarLinksMobile = document.querySelector(".navbar__links-mobile");

    if (burgerCheckbox && navbarLinksMobile) {
        burgerCheckbox.addEventListener("change", function () {
            if (this.checked) {
                navbarLinksMobile.style.display = "flex";
            } else {
                navbarLinksMobile.style.display = "none";
            }
        });
    }

    setInterval(() => {
        if (window.innerWidth > 768) {
            navbarLinksMobile.style.display = "none";
            burgerCheckbox.checked = false;
        } else {
            if (burgerCheckbox.checked) {
                navbarLinksMobile.style.display = "flex";
            }
        }
    }, 2000);

    // Print input value of search boxes on Enter key press
    // const searchInputs = document.querySelectorAll(".navbar__search-text");
    // searchInputs.forEach((searchInput) => {
    //     searchInput.addEventListener("keypress", function (event) {
    //         if (event.key === "Enter") {
    //             console.log(`Search query: ${this.value}`);
    //         }
    //     });
});
