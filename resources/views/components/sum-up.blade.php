<div class="sum-up-wrapper middle-wrapper">
    <div class="sum-up-top">
        <p class="sum-up-top__text"><span class="sum-up-top__left middle-wrapper-text">Pre sum ({{$productCountSum}} products)</span><span class="sum-up-top__right">{{number_format($productPriceSum, 2, ',', '.')}} €</span></p>
        @if($deliveryPriceSum)
            <p class="sum-up-top__text"><span class="sum-up-top__left">Delivery</span><span class="sum-up-top__right sum-up-top__delivery">{{number_format($deliveryPriceSum, 2, ',', '.')}} €</span></p>
        @else
            <p class="sum-up-top__text"><span class="sum-up-top__left">Delivery</span><span class="sum-up-top__right sum-up-top__delivery">Free delivery</span></p>
        @endif
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
            <span class="sum-up-bot__bold">{{number_format($productPriceSum + $deliveryPriceSum , 2, ',', '.')}} €</span>
        </p>
        <p class="sum-up-bot__tax"><span>(21% PVN: {{number_format(($productPriceSum + $deliveryPriceSum)*0.21 , 2, ',', '.')}} €)</span></p>
    </div>

</div>
