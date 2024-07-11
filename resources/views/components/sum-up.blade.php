<div class="sum-up-wrapper middle-wrapper">
    <div class="sum-up-top">
        <p class="sum-up-top__text"><span class="sum-up-top__left middle-wrapper-text">Pre sum (2 products)</span><span class="sum-up-top__right">732$</span></p>
        <p class="sum-up-top__text"><span class="sum-up-top__left">Delivery</span><span class="sum-up-top__right">4.85 $</span></p>
    </div>
    <div class="promo">
    <p>Promocode</p>
        <form>
            <div class="promo__box">
                <input type="text" class="promo__box-text" placeholder="XXX-XXX">
                <input type="submit" class="promo__box_submit" value="Add">
            </div>
        </form>
    </div>
    <hr class="Line">
    <div class="sum-up-bot">
        <p class="sum-up-bot__price-row">
            <span class="sum-up-bot__bold">Sum</span>
            <span class="sum-up-bot__bold">736.85 $</span>
        </p>
        <p class="sum-up-bot__tax"><span>(21% PVN: 117.15 $)</span></p>
    </div>

</div>

<script>


    document.addEventListener('DOMContentLoaded', () => {
        // const currentImage_Id = 0
        const MAX_COUNT = parseInt(document.querySelector('.id-1 .item-wrapper__more-or-less .price').max);
        let productCount = 1;
        const productCost = 366;

        const counter_increment = document.querySelector('.id-1 .item-wrapper__more-or-less .plus');
        const counter_decrement = document.querySelector('.id-1 .item-wrapper__more-or-less .minus');
        const counter = document.querySelector('.id-1 .item-wrapper__more-or-less .price');
        const big_Price = document.querySelector('.id-1 .item-wrapper__end-price')
        const side_cost = document.querySelector('.id-1 .item-wrapper__amount-price')

        if (counter.value >= MAX_COUNT){
            counter_increment.style.color = "#ADADAD"
        }
        if (counter.value <= 1){
            counter_decrement.style.color = "#ADADAD"
        }
        updateSumUpPrice()

        counter_increment.addEventListener('click', () => {
            if (counter.value < MAX_COUNT) {
                counter.value++;
                counter_decrement.style.color = "#204012"
            }
            if (counter.value >= MAX_COUNT){
                counter_increment.style.color = "#ADADAD"
            }
            updateCardPrices(productCost, counter, big_Price, side_cost)
            updateSumUpPrice()
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
            updateSumUpPrice()

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
            updateSumUpPrice()

        })

    })

    function updateCardPrices(price, counter, bigPrice, sidePrice) {
        bigPrice.textContent = (price*counter.value) + "$"
        sidePrice.textContent = counter.value + " x " + price + "$"
    }




    function updateSumUpPrice(){
        const listBigPrices = document.querySelectorAll(".item-wrapper__end-price")
        const sumUpPrice = document.querySelector(".sum-up-bot__bold + .sum-up-bot__bold")
        let sum = 0;

        for (const i of listBigPrices){
            sum += parseInt(i.textContent.replace("$", ""));
        }

        sumUpPrice.textContent = sum + " $";

    }



</script>
