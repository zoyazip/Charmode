@isset($product)
    <a href="{{ route('product', ['id' => $product->id]) }}" id='product-{{ $product->id }}'
        style="background-image: url('{{ URL::asset($product->images[0]->url) }}'); background-position: center;  {{ isset($suggestion) ? 'background-size: cover;' : 'background-size: cover;' }}"
        class="product-card cursor-zoom-in p-4 rounded-2xl overflow-hidden relative transition-all bg-center bg-no-repeat
                {{ isset($suggestion) ? 'w-full min-h-[400px] md:min-h-[400px] lg:min-h-[300px] xl:min-h-[250px]' : 'min-h-[500px]' }}
                {{ isset($main) ? ($expand ? 'lg:col-span-2 lg:row-span-2' : '') : '' }}
                {{ isset($plp) ? 'w-full min-h-[400px] md:min-h-[400px] lg:min-h-[300px] xl:min-h-[250px]' : '' }} ">
        <div class="card-data flex flex-col items-start justify-between h-full">
            @include('components/price', [
                'price' => $product->newPrice,
                'old_price' => $product->oldPrice,
            ])
            <div class="card__title-container w-full flex justify-between items-center z-10">
                <div class="title">
                    <h3 class="font-bold text-white text-lg truncate">{{ $product->name }}</h3>
                </div>

                <form action="@auth {{ route('cart.store') }} @endauth @guest {{ route('cart.store.guest') }} @endguest"
                    method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{ $product->id }}>
                    <input type="hidden" name="color_id" value={{ $product->productColors[0]->color_id }}>
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit"
                        class="add-to-cart w-8 h-8 rounded-full bg-white transition-all cursor-pointer z-[100] flex justify-center items-center">
                        <span class="text-xl font-bold text-main-green">+</span>
                    </button>
                </form>

            </div>
            <div class="card-gradiet absolute h-1/2 w-full bottom-0 left-0 bg-gradient-to-t from-gray-800 opacity-50 z-1">
            </div>
        </div>
        <div class="discounts-delivery-badges absolute top-3 right-3 flex flex-col gap-2">
            @if ($product->discount != 0)
                <div class="discount">
                    @include('components/product-card-discount')
                </div>
            @endif
            @if ($product->shippingCost == 0)
                <div class="delivery">
                    @include('components/product-card-delivery')
                </div>
            @endif
        </div>
    </a>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            function addToCart(event) {
                event.preventDefault()
            }
        </script>
    @endpush
@endisset
