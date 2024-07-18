<div class="price-container">
    <div class="price bg-white px-3 py-2 rounded-xl flex flex-col">
        <h2 class="font-bold text-xl text-green-900">{{ number_format($price, 2) }} €</h2>
        <h2 class=" text-slate-300 line-through text-[14px]">
            @if ($old_price != $price)
                {{ number_format($old_price, 2) }}€
            @endif
        </h2>
    </div>
</div>
