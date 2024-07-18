{{-- @if (isset($products))
    @php
    dd($products);
    @endphp
@endif --}}
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/plp/filter.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/pages/plp/plp.css') }}">
@endpush

@extends('layouts.main')

@section('content')
    <div class="plp-page-container">
        @include('components/filter')
        <div style="width: 100%">
            {{-- <h1>Filter debug list</h1>
            @if (isset($data))
                <div>
                    <p>Min Price: {{ $data['min_price'] ?? 'N/A' }}</p>
                    <p>Max Price: {{ $data['max_price'] ?? 'N/A' }}</p>
                    <p>Product Width: {{ $data['min_width'] ?? 'N/A' }}</p>
                    <p>Product Width: {{ $data['max_width'] ?? 'N/A' }}</p>
                    <p>Product Height: {{ $data['min_height'] ?? 'N/A' }}</p>
                    <p>Product Height: {{ $data['max_height'] ?? 'N/A' }}</p>
                    <p>Product Depth: {{ $data['min_depth'] ?? 'N/A' }}</p>
                    <p>Product Depth: {{ $data['max_depth'] ?? 'N/A' }}</p>
                    <p>Is Available: {{ isset($data['is_available']) ? 'Yes' : 'No' }}</p>
                    <h2>Colors:</h2>
                    <ul>
                        @if (!empty($data['colors']))
                            <p>Colors: {{ implode(", ", $data['colors']) }}</p>
                        @endif
                    </ul>
                </div>
            @endif --}}
            {{-- @if (isset($data)) --}}
            <div class="plp-product-list-container min-h-[900px]">
                @if (isset($products))
                    @include('components/PLP-components/plp-pdoruct-list', ['products' => $products])
                @endif
                {{-- Pagination Elements --}}
                @if ($products->hasPages() && $products->lastPage() > 1)
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span aria-hidden="true">&laquo;</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $products->previousPageUrl() }}" rel="prev"
                                    aria-label="@lang('pagination.previous')">&laquo;</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                            <li>
                                <a href="{{ $products->nextPageUrl() }}" rel="next"
                                    aria-label="@lang('pagination.next')">&raquo;</a>
                            </li>
                        @else
                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span aria-hidden="true">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
            {{-- @endif --}}
        </div>
    </div>
@endsection
