<div class="price-container">
    <div class="price bg-white p-4 rounded-xl inline-block">
        <div class="">
            <h2 class="font-bold text-2xl text-green-900">{{ number_format($price, 2) }}$</h2>
        </div>
        <div class="">
            <h2 class=" text-lg text-slate-300 line-through">
                @if ($old_price != $price)
                    {{ number_format($old_price, 2) }}$
                @endif
            </h2>
        </div>
    </div>
</div>