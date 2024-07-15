@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/plp/filter.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/pages/plp/plp.css') }}">
@endpush

@extends('layouts.main')

@section('content')
    <div class="inner-container">
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
                <div class="plp-product-list-container">
                    @include('../../components/PLP-components/plp-pdoruct-list')
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
@endsection
