button = document.querySelector('.popup__button-primary') 

button.addEventListener('click', function () {
    console.log(123)
    document.querySelector('.popup-background').style.display = 'none';
    document.cookie = "cookie_consent=true; path=/; max-age=" + (60 * 60 * 24 * 365); // 1 year
});
