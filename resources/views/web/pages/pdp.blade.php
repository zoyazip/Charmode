@extends('layouts.main')

@section('title', $product->name)

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/pages/pdp/pdp.css') }}">
@endpush

@section('content')
    <div class="product-main-info-container h-auto w-full md:h-[70vh] flex flex-col md:flex-row gap-8">
        @include('../../components/PDP-components/pdp-gallery')
        @include('../../components/PDP-components/pdp-main-info-form')
    </div>
    <div class="pdp-description-container mt-10 md:w-full flex flex-col md:flex-row gap-4">
        @include('../../components/PDP-components/pdp-description')
        @include('../../components/PDP-components/pdp-characteristics')
    </div>
    <div class="pdp-comments-container mt-10 w-full">
        @include('../../components/PDP-components/pdp-comments')
    </div>

    @auth
        <div class="pdp-comment-form-container flex justify-center mt-10 mb-20 w-full">
            @include('../../components/PDP-components/pdp-comment-form')
        </div>
    @endauth

    <div class="pdp-suggestion-container h-auto mt-20 mb-20 md:mt-14">
        @include('../../components/PDP-components/pdp-suggestion')
    </div>
@endsection
