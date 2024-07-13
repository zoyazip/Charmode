<div id='product-{{ $product->id }}'
    style="background-image: url('{{ $product->img_path }}'); background-position: center;  {{ isset($suggestion) ? 'background-size: cover;' : 'background-size: cover;' }}"
    class="product-card cursor-zoom-in p-4 rounded-2xl overflow-hidden relative transition-all bg-center bg-no-repeat {{ isset($suggestion) ? 'w-full min-h-[400px] md:min-h-[400px] lg:min-h-[300px] xl:min-h-[250px]' : 'min-h-[500px]' }}
            {{ isset($main) ? ($product->expand ? 'lg:col-span-2 lg:row-span-2' : '') : '' }} ">
    <div class="card-data flex flex-col items-start justify-between h-full">
        @include('components/price', [
            'price' => $product->price,
            'old_price' => $product->old_price,
        ])
        <div class="card__title-container w-full flex justify-between items-center z-10">
            <div class="title">
                <h3 class="font-bold text-white text-xl truncate">{{ $product->title }}</h3>
            </div>
            <div
                class="add-to-cart w-8 h-8 rounded-full bg-white transition-all cursor-pointer flex justify-center items-center">
                <h4 class="text-xl font-bold text-main-green">+</h4>
            </div>
        </div>
        <div class="card-gradiet absolute h-1/2 w-full bottom-0 left-0 bg-gradient-to-t from-gray-800 opacity-50 z-1">
        </div>
    </div>
</div>
