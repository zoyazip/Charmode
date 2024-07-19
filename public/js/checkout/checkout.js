function changeDataArrow(divId, arrowId) {
    const div = document.getElementById(divId);
    const arrow = document.getElementById(arrowId);
    if (arrow.classList.contains("close__arrow")) {
        arrow.classList.remove("close__arrow");
        arrow.classList.add("open__arrow");
        div.classList.remove("hidden__div");
        div.classList.add("visible__div");
    } else {
        arrow.classList.remove("open__arrow");
        arrow.classList.add("close__arrow");
        div.classList.add("hidden__div");
        div.classList.remove("visible__div");
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
