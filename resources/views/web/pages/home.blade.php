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
                <img src="/assets/chair-placeholder.png" alt="">
            </div>
            <div class="swiper-slide">
                <img src="/assets/chair-placeholder.png" alt="">
            </div>
            <div class="swiper-slide">
                <img src="/assets/chair-placeholder.png" alt="">
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

    <div class="sale-line-container pt-14">
        @include('components/sale-line')
    </div>

    <div class="home-sort-container flex justify-end mt-8">
        @include('components/list-sort')
    </div>

    <div class="main-grid-container pb-10">
        @include('components/grid-layout')
    </div>
@endsection

@push('scripts')
    @once
        <script type="module" src="{{ URL::asset('js/swiper.js') }}" defer></script>
        <script type="module" src="{{ URL::asset('js/gallery-horizontal-scroll.js') }}" defer></script>
    @endonce
@endpush
