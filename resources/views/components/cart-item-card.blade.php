<div class="item-wrapper middle-wrapper id-1">

    <div class="item-wrapper__left">
        <img class="cart-image" src="{{ URL::asset('assets/chair-placeholder.png')}}" alt="chair">
    </div>
{{--  vieninieka vietā pie id tagiem pēc - jāraksta unikālais id  --}}
    <div class="item-wrapper__right">
        <div class="item-wrapper__right-left">
            <p class="item-wrapper__product-name">Lorem ipsum dolor sit.</p>
            <p class="item-wrapper__amount-price">1 x 366€</p>
            <div class="item-wrapper__color-row">
                <span class="item-wrapper__red-color"></span>
            </div>
            <p class="item-wrapper__free-delivery">Free delivery</p>
        </div>
        <div class="item-wrapper__right-right">
            <p class="item-wrapper__end-price">366€</p>
            <form>
                <p class="item-wrapper__more-or-less">
                    <a class="item-wrapper__inc-btn" ><span class="item-wrapper__more-or-less-item minus" >-</span></a>
                    <input type="number" min="1" max="10" value="1" class="item-wrapper__more-or-less-item item-wrapper__price">
                    {{--                inputam max jāsaņem no datubazes, tā pat arī ar value--}}
                    <a class="item-wrapper__inc-btn" ><span class="item-wrapper__more-or-less-item plus" >+</span></a>
                </p>
            </form>
            <a class="item-wrapper__trash"><img src="{{ URL::asset('assets/svg/trash.svg') }}" alt="trash" class="item-wrapper__trash-icon"></a>
        </div>
    </div>
</div>
