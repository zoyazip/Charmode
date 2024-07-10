@extends('layouts.main')

@section('title', 'Home page')

@push('styles')
    {{-- main slider stylesheets --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ URL::asset('css/pages/home/slider.css') }}" />

    {{-- page stylesheets --}}
    <link rel="stylesheet" href="{{ URL::asset('css/pages/home/home.css') }}" />
@endpush

@section('content')
    <div class="inner-container">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
            </div>
            <!-- pagination -->
            <div class="swiper-pagination"></div>

            <!-- navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        @include('components/grid-layout')

        @push('scripts')
            @once
                <script type="module" src="{{ URL::asset('js/swiper.js') }}" defer></script>
                <script type="module" src="{{ URL::asset('js/gallery-horizontal-scroll.js') }}" defer></script>
            @endonce
        @endpush

    </div>
@endsection
