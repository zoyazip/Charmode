<div class="item-wrapper middle-wrapper id-{{ $product['product_id'] }}" xmlns="http://www.w3.org/1999/html">
    <div class="item-wrapper__left">
        <img class="cart-image" src="{{ URL::asset($product['products']->images[0]->url) }}" alt="🪑">
    </div>
    <div class="item-wrapper__right">
        <div class="item-wrapper__right-left">
            <p class="item-wrapper__product-name">{{ $product['products']->name }}</p>
            <p class="item-wrapper__amount-price">{{ $product['quantity'] }} x
                {{ $product['products']->newPrice }} €</p>
            <div class="item-wrapper__color-row">
                <span class="item-wrapper__red-color" style="background-color: {{ $product['hexColor'] }}"></span>
            </div>
            @if ($product['products']->shippingCost)
                <p class="item-wrapper__free-delivery">
                    {{ number_format($product['products']->shippingCost, 2, ',', '.') }}
                    €</p>
            @else
                <p class="item-wrapper__free-delivery">Free delivery</p>
            @endif
        </div>
        <div class="item-wrapper__right-right">
            <p class="item-wrapper__end-price">
                {{ number_format($product['quantity'] * $product['products']->newPrice, 2, ',', '.') }} €</p>
            <p class="item-wrapper__more-or-less">
                <a class="item-wrapper__inc-btn"><span class="item-wrapper__more-or-less-item minus">-</span></a>
                <input name="{{ $product['product_id'] }}-{{ $product['color_id'] }}" form="update-form"
                    id="{{ $product['product_id'] }}" type="number" min="1"
                    max="{{ $product['products']->stockQuantity }}" value="{{ $product['quantity'] }}"
                    class="item-wrapper__more-or-less-item item-wrapper__price">
                <a class="item-wrapper__inc-btn"><span class="item-wrapper__more-or-less-item plus">+</span></a>
            </p>
            <button class="item-wrapper__trash"><img src="{{ URL::asset('assets/svg/trash.svg') }}" alt="🗑"
                    class="item-wrapper__trash-icon"></button>
        </div>
    </div>
</div>
