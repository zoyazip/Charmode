@php
    $counter = 0;
@endphp

<div class="plp flex flex-col gap-8">
    <div class="plp-sort ml-auto mt-2">
        @include('components/list-sort')
    </div>

    <div class="plp-list grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
        @foreach ($products as $product)
            @include('components/product-card', ['plp' => true])
            @php
                $counter++;
            @endphp
        @endforeach
        @php
            $isCounterZero = $counter === 0;
        @endphp
    </div>
</div>

@if ($isCounterZero)
    <div class="h-[30vh] flex w-full flex-col justify-center">
        <p class="text-2xl text-center text-gray-700">
            No products found
        </p>
    </div>
@endif

@push('scripts')
    <script src="{{ URL::asset('js/product_card.js') }}"></script>
@endpush
