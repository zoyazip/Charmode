function openBlock(containerId, arrowId) {
    const container = document.getElementById(containerId);
    const arrow = document.getElementById(arrowId);

    if (container.style.display === 'none' || container.style.display === '') {
        container.style.display = 'flex';
        arrow.classList.add('rotate-arrow');
    } else {
        container.style.display = 'none';
        arrow.classList.remove('rotate-arrow');
    }
}

function hideButton(btnId) {
    const btn = document.getElementById(btnId);
    if (btn.hasAttribute("disabled")) {
        btn.removeAttribute("disabled");
    } else {
        btn.attributes.add("disabled");
    }
}

function showDelivery(deliveryMethod) {
    const dpdDiv = document.getElementById("dpdSelect");
    const omnivaDiv = document.getElementById("omnivaSelect");
    if (deliveryMethod === "dpd") {
        if (dpdDiv.classList.contains("hidden__div")) {
            dpdDiv.classList.remove("hidden__div");
            dpdDiv.classList.add("visible__div");
            if (omnivaDiv.classList.contains("visible__div")) {
                omnivaDiv.classList.remove("visible__div");
                omnivaDiv.classList.add("hidden__div");
            }
        }
    } else if (deliveryMethod === "omniva") {
        if (omnivaDiv.classList.contains("hidden__div")) {
            omnivaDiv.classList.remove("hidden__div");
            omnivaDiv.classList.add("visible__div");
            if (dpdDiv.classList.contains("visible__div")) {
                dpdDiv.classList.remove("visible__div");
                dpdDiv.classList.add("hidden__div");
            }
        }
    } else {
        if (omnivaDiv.classList.contains("visible__div")) {
            omnivaDiv.classList.remove("visible__div");
            omnivaDiv.classList.add("hidden__div");
        }
        if (dpdDiv.classList.contains("visible__div")) {
            dpdDiv.classList.remove("visible__div");
            dpdDiv.classList.add("hidden__div");
        }
    }
}

let loginLink = document.querySelector(".login-link-checkout");
let loginBtnRef = document.querySelector(".login-btn");

loginLink.addEventListener("click", () => {
    console.log("here");
    if (loginBtnRef) {
        console.log("here1");
        loginBtnRef.click();
    }
});
