// public/js/navbar.js

// document.addEventListener("DOMContentLoaded", (event) => {
//     // Toggle the burger menu
//     const burgerCheckbox = document.querySelector(".navbar__burger-checkbox");
//     const navbarLinksMobile = document.querySelector(".navbar__links-mobile");

//     if (burgerCheckbox && navbarLinksMobile) {
//         burgerCheckbox.addEventListener("change", function () {
//             if (this.checked) {
//                 navbarLinksMobile.style.display = "flex";
//             } else {
//                 navbarLinksMobile.style.display = "none";
//             }
//         });
//     }

// Print input value of search boxes on Enter key press
// const searchInputs = document.querySelectorAll(".navbar__search-text");
// searchInputs.forEach((searchInput) => {
//     searchInput.addEventListener("keypress", function (event) {
//         if (event.key === "Enter") {
//             console.log(`Search query: ${this.value}`);
//         }
//     });
// });

function onResize() {
    const width = window.innerWidth;
    const navbarLinksMobile = document.querySelector(".navbar__links-mobile");
    const burgerCheckbox = document.querySelector(".navbar__burger-checkbox");

    if (width > 768) {
        burgerCheckbox.checked = false;
        navbarLinksMobile.style.display = "none";
    }
}
window.addEventListener("resize", onResize);


function toggleDropdown() {
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
