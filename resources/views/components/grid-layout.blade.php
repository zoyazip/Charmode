

<div class=" flex flex-col items-center justify-center py-4">
    <div class="inner-container max-w-[1200px] w-[90%] h-full">
        <div class="grid-layout w-full grid gap-3 grid-flow-dense grid-cols-1 md:grid-cols-2 
                    {{ count($products) < 12 ? '' : 'grid-rows-6' }}">
            @foreach ($products as $index => $product)
                @include('components/product-card', [
                    'main' => true,
                    'expand' => $loop->index % 4 == 0 || $loop->index % 8 == 0 ? true : false
                ])
            @endforeach
        </div>
        <div class="pagination">
            <!-- Display previous page link if it exists -->
            @if ($currentPage > 2)
                <a href="{{ $products->url(1) }}">1...</a>
            @endif

            @if ($previousPage)
                <a href="{{ $products->url($previousPage) }}">{{ $previousPage }}</a>
            @endif

            <!-- Display current page -->
            <b>{{ $currentPage }}</b>

            <!-- Display next 3 pages -->
            @foreach ($nextPages as $page)
                @if ($page != $currentPage)
                    <a href="{{ $products->url($page) }}">{{ $page }}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>

<script>
    [...document.querySelectorAll('.product-card')].forEach(function(item) {

        const selectedProduct = document.getElementById(item.id)
        const selectedProductBtn = selectedProduct.querySelector('.card-data').querySelector(
            '.card__title-container').querySelector('.add-to-cart')

        item.addEventListener('mouseenter', function() {
            item.style.transform = 'rotate(1deg)'
        })
        item.addEventListener('mouseleave', function() {
            item.style.transform = 'rotate(0deg)'
        })
    })
</script>
