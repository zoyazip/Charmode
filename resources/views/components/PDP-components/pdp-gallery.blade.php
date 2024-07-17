@push('styles')
    {{-- Swiper JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ URL::asset('/css/pages/pdp/slider.css') }}">
@endpush

<div class="swiper mySwiper h-[50vh] md:h-full rounded-2xl flex gap-4 w-full md:w-1/2 lg:w-2/3 lg:h-full">
    <div class="swiper-wrapper full-image-container w-full box-border ">
        @foreach ($product->images as $img)
            <div style="background-image: url({{ url($img->url) }})"
                class="swiper-slide w-full h-full bg-no-repeat bg-cover bg-center select-none ">
            </div>
        @endforeach
    </div>
    <div class="swiper-button-next select-none"> <img src="{{ URL::asset('assets/svg/arrow.svg') }}" alt="">
    </div>
    <div class="swiper-button-prev select-none"> <img src="{{ URL::asset('assets/svg/arrow.svg') }}" alt="">
    </div>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            mousewheel: true,
            slidesPerView: 'auto',
            loop: true
        });
    </script>
@endpush
