<div class="pdp-suggestion">
    <div class="pdp-suggestion-title">
        <h3 class="font-bold text-2xl text-main-green">You should also like</h3>
    </div>
    <div class="suggestions grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 mt-10 w-full ">
        @foreach ($similar as $product)
            @include('components/product-card', ['suggestion' => true])
        @endforeach
    </div>
</div>

@push('scripts')
    <script src="{{ URL::asset('js/product_card.js') }}"></script>
@endpush
