[...document.querySelectorAll('.product-card')].forEach(function(item) {

    const selectedProduct = document.getElementById(item.id)
    const selectedProductBtn = selectedProduct.querySelector('.card-data').querySelector(
        '.card__title-container').querySelector('.add-to-cart')

    item.addEventListener('mouseenter', function() {
        item.style.transform = 'rotate(1deg)'
    })
    item.addEventListener('mouseleave', function() {
        item.style.transform = 'rotate(0deg)'
    })
})