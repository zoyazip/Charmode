<form class="main-info-container md:py-10 md:w-1/2 lg:w-1/3 h-full flex flex-col justify-between"
    action="/cartitem/create/{{$product->id}}/1" method="POST">
    {{-- action="{{ route('cart.store', ['product_id' => $product->id, 'color_id' => $color_id, 'quantity' => 1]) }}" method="POST"> --}}
    @csrf
    <div class="">
        <div class="product-title">
            <h2 class="font-bold text-3xl lg:text-3xl text-main-green">{{ $product->name }}</h2>
        </div>
        <div class="product-code mt-2">
            <p class="text-secondary-grey">Product code: {{ $product->product_code }}</p>
        </div>
        <div class="rating-and-comments-container flex gap-6 mt-2">
            <div class="rating flex gap-2">
                <h3 class="text-main-green font-bold text-xl">{{ $rating }}</h3>
                <img src='{{ URL::asset('assets/svg/rating.svg') }}' />
            </div>
            <div class="comments flex gap-2 cursor-pointer">
                <h3 class="text-main-green font-bold text-xl">{{ count($product->reviews) }}</h3>
                <img src='{{ URL::asset('assets/svg/comment.svg') }}' />
            </div>
        </div>
        <div class="">
            <div class="product-color mt-6">
                <h3 class="text-lg font-bold text-main-green">Color</h3>
                <div class="color-container flex gap-2 pt-2">
                    @foreach ($product->productColors as $index => $color)
                        <label>
                            <input id={{ $index }} type="radio" name='color_id' class="color-input pl-3"
                                @checked($index == 0 ? true : false) value="{{$color->id}}"/>
                            <div id={{ $index }} style="background-color: {{ $color->color->hex }}"
                                class="color relative w-8 h-8 rounded-full cursor-pointer outline-offset-2 {{ $color->color->hex === '#ffffff' ? 'border border-black' : '' }}">
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="delivery-container flex gap-1 mt-6 flex-col">
                <h3 class="text-lg font-bold text-main-green">Delivery</h3>
                <p class="text-md">
                    {{ $product->shippingCost ? number_format($product->shippingCost, 2) . ' € delivery' : 'Free delivery' }}
                </p>
            </div>
        </div>
    </div>
    <div class="">
        <div class="add-to-cart flex gap-4 mt-10 md:mt-0 items-center">
            <button type="submit"
                class="bg-main-green text-white flex items-center justify-between px-4 py-3 rounded-lg w-3/4 md:w-full xl:w-2/3 hover:drop-shadow-lg transition-all">
                <div class="add-to-cart-btn-text">
                    <p>Add to Cart</p>
                </div>
                <div class="add-to-cart-btn-price">
                    <p class="font-bold text-2xl">{{ number_format($product->newPrice, 2) }} €</p>
                </div>
            </button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const likeCheckbox = document.querySelector('.like-checkbox')
            const likeCheckboxHeart = document.querySelector('.like-element').querySelector('img')
            const price = document.querySelector('.price')

            //like feature
            likeCheckboxHeart.addEventListener('click', () => {
                if (likeCheckbox.checked) {
                    likeCheckboxHeart.src = 'assets/svg/heart_filled.svg'
                } else {
                    likeCheckboxHeart.src = 'assets/svg/heart.svg'
                }
            })

        })
    </script>
@endpush
