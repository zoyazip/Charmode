<div class="item-wrapper middle-wrapper id-1">

    <div class="item-wrapper__left">
        <img class="cart-image" src="assets/chair-placeholder.png" alt="chair">
    </div>
{{--  vieninieka vietā pie id tagiem pēc - jāraksta unikālais id  --}}
    <div class="item-wrapper__right">
        <div class="item-wrapper__right-left">
            <p class="item-wrapper__product-name">Lorem ipsum dolor sit.</p>
            <p class="item-wrapper__amount-price">1 x 366$</p>
            <div class="item-wrapper__color-row">
                <span class="item-wrapper__red-color"></span>
            </div>
            <p class="item-wrapper__free-delivery">Free delivery</p>
        </div>
        <div class="item-wrapper__right-right">
            <p class="item-wrapper__end-price">366$</p>
            <p class="item-wrapper__more-or-less">
                <a class="item-wrapper__inc-btn" ><span class="item-wrapper__more-or-less-item minus" >-</span></a>
                <input type="number" min="1" max="10" value="1" class="item-wrapper__more-or-less-item price" id="amount-1">
{{--                inputam max jāsaņem no datubazes, tā pat arī ar value--}}
                <a class="item-wrapper__inc-btn" ><span class="item-wrapper__more-or-less-item plus" >+</span></a>
            </p>
            <a class="item-wrapper__trash"><img src="{{ URL::asset('assets/svg/trash.svg') }}" alt="trash" class="item-wrapper__trash-icon"></a>
        </div>
    </div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', () => {
        // const currentImage_Id = 0
        const MAX_COUNT = parseInt(document.querySelector('.id-1 .item-wrapper__more-or-less .price').max);
        console.log(MAX_COUNT)
        let productCount = 1;
        const productCost = 366;

        const counter_increment = document.querySelector('.id-1 .item-wrapper__more-or-less .plus');
        const counter_decrement = document.querySelector('.id-1 .item-wrapper__more-or-less .minus');
        const counter = document.querySelector('.id-1 .item-wrapper__more-or-less .price');
        const big_Price = document.querySelector('.id-1 .item-wrapper__end-price')
        const side_cost = document.querySelector('.id-1 .item-wrapper__amount-price')

        counter_increment.addEventListener('click', () => {
            if (counter.value < MAX_COUNT) {
                counter.value++;
                counter_decrement.style.color = "#204012"
            }
            if (counter.value >= MAX_COUNT){
                counter_increment.style.color = "#ADADAD"
            }

        updateCardPrices(productCost, counter, big_Price, side_cost)
        })

        counter_decrement.addEventListener('click', () => {

            if (counter.value > 1) {
                counter.value--;
                counter_increment.style.color = "#204012"
            }
            if (counter.value <= 1){
                counter_decrement.style.color = "#ADADAD"
            }

            updateCardPrices(productCost, counter, big_Price, side_cost)

        })




        counter.addEventListener('change', () => {
            if (counter.value > MAX_COUNT) {
                counter.value = MAX_COUNT
                counter_increment.style.color = "#ADADAD"
            } else if (counter.value < 1){
                counter.value = 1
                counter_decrement.style.color = "#ADADAD"
            }
            else {
                counter_increment.style.color = "#204012"
                counter_decrement.style.color = "#204012"

            }

            updateCardPrices(productCost, counter, big_Price, side_cost)

        })

    })

    function updateCardPrices(price, counter, bigPrice, sidePrice) {
        bigPrice.textContent = (price*counter.value) + "$"
        sidePrice.textContent = counter.value + " x " + price + "$"
    }



</script>
