<div class="price-container">
    <div class="price bg-white px-3 py-2 rounded-xl flex items-center {{ $old_price != $price ? 'gap-4' : '' }}">
        <h2 class="font-bold text-2xl text-green-900">{{ number_format($price, 2) }} €</h2>
        <h2 class=" text-lg text-slate-300 line-through">
            @if ($old_price != $price)
                {{ number_format($old_price, 2) }}$
            @endif
        </h2>
    </div>
</div>
