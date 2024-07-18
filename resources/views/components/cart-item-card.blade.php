<div class="item-wrapper middle-wrapper id-{{$product->id}}" xmlns="http://www.w3.org/1999/html">

    <div class="item-wrapper__left">
        <img class="cart-image" src="{{ URL::asset($product->product->images[0]->url)}}" alt="chair">
    </div>
{{--  vieninieka vietā pie id tagiem pēc - jāraksta unikālais id  --}}
    <div class="item-wrapper__right">
        <div class="item-wrapper__right-left">
            <p class="item-wrapper__product-name">{{$product->product->name}}</p>
            <p class="item-wrapper__amount-price">{{$product->quantity}} x {{number_format($product->product->newPrice, 2, ',', '.')}} €</p>
            <div class="item-wrapper__color-row">
                <span class="item-wrapper__red-color"></span>
            </div>
            @if($product->product->shippingCost)
                <p class="item-wrapper__free-delivery">{{number_format($product->product->shippingCost, 2, ',', '.')}} €</p>
            @else
                <p class="item-wrapper__free-delivery">Free delivery</p>
            @endif
        </div>
        <div class="item-wrapper__right-right">
            <p class="item-wrapper__end-price">{{number_format($product->quantity*$product->product->newPrice, 2, ',', '.')}} €</p>
                <p class="item-wrapper__more-or-less">
                    <a class="item-wrapper__inc-btn" ><span class="item-wrapper__more-or-less-item minus" >-</span></a>
                    <input name="{{$product->product_id}}" form="update-form" id="{{$product->product_id}}" type="number" min="1" max="{{$product->product->stockQuantity}}" value="{{$product->quantity}}" class="item-wrapper__more-or-less-item item-wrapper__price">
                    <a class="item-wrapper__inc-btn" ><span class="item-wrapper__more-or-less-item plus" >+</span></a>
                </p>
            <form id="trash-form" method="post" action="/cart">
                @csrf
                @method('put')
                <input type="hidden" name="product_id" value="{{$product->product_id}}">
                <input type="hidden" name="color_id" value="{{$product->color_id}}">
                <button type="submit" class="item-wrapper__trash"><img src="{{ URL::asset('assets/svg/trash.svg') }}" alt="trash" class="item-wrapper__trash-icon"></button>
            </form>
        </div>
    </div>
</div>
