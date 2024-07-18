<div
    class="product-card-discount {{ isset($main) ? 'w-20 h-20' : 'w-16 h-16' }} bg-secondary-green flex justify-center items-center flex-col rounded-full">
    <h3 class="{{ isset($main) ? 'text-2xl' : 'text-md' }} font-bold text-main-green">-{{ $product->discount }}%</h3>
</div>
