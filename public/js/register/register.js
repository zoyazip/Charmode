function enableLoginBtn() {
    const registerBtn = document.getElementById('registerBtn');
    const checkbox = document.getElementById('registerCheckbox');
    if (checkbox.checked) {
        registerBtn.disabled = false;
    } else {
        registerBtn.disabled = true;
    }
}