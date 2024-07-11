<div id='product-{{ $product->id }}'
    style="background-image: url('{{ $product->img_path }}'); backgroud-repeat: no-repeat; background-position: center; background-size: 110% "
    class="product-card p-4 min-h-[300px] rounded-2xl overflow-hidden relative transition-all bg-center 
            {{-- bg-[url('{{ $product->img_path }}')] bg-no-repeat  --}}
            @if ($product->expand) lg:col-span-2 lg:row-span-2 @endif">
    <div class="card-data flex flex-col justify-between h-full">
        @include('components/price', [
            'price' => $product->price,
            'old_price' => $product->old_price,
        ])
        <div class="card__title-container w-full flex justify-between items-center z-10" >
            <div class="title">
                <h3 class="font-bold text-white text-xl">{{ $product->title }}</h3>
            </div>
            <div
                class="add-to-cart w-10 h-10 rounded-full bg-white lg:opacity-0 lg:-translate-x-5 transition-all cursor-pointer">
            </div>
        </div>
        <div
            class="card-gradiet absolute h-1/2 w-full bottom-0 left-0 bg-gradient-to-t from-gray-800 opacity-50 z-1">
        </div>
    </div>
</div>