let loginBtn = document.querySelector('.login-btn')
loginBtn.addEventListener('click', () => {
    document.querySelector('.login-container').style.transform = 'translateX(0px)'
    document.querySelector('.login-container').style.boxShadow = '-40px 0px 50px #00000010'
})

let closeLogin = document.querySelector('.close-login')
closeLogin.addEventListener('click', () => {
    document.querySelector('.login-container').style.transform = 'translateX(100%)'
    document.querySelector('.login-container').style.boxShadow = 'none'
})
