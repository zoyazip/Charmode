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
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="/assets/webp/main-slider/Main_1.webp" alt="slide">
            </div>
            <div class="swiper-slide">
                <img src="/assets/webp/main-slider/Main_2.webp" alt="slide">
            </div>
            <div class="swiper-slide">
                <img src="/assets/webp/main-slider/Main_3.webp" alt="slide">
            </div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>

        <!-- navigation buttons -->
        <div class="swiper-button-prev">
            <img src="assets/svg/arrow.svg" alt="←">
        </div>
        <div class="swiper-button-next">
            <img src="assets/svg/arrow.svg" alt="→">
        </div>
    </div>

    <div class="sale-line-container pt-8 md:pb-10">
        @include('components/sale-line')
    </div>

    <div class="main-grid-container pb-10">
        @include('components/grid-layout', ['main'=>true])
    </div>

    <div class="about-us-container mb-20">
        @include('components/main-page-about-us')
    </div>
@endsection

@push('scripts')
    @once
        <script type="module" src="{{ URL::asset('js/swiper.js') }}" defer></script>
    @endonce
@endpush
