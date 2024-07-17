<!-- Swiper JS -->
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .swiper-button-next.swiper-button-disabled,
        .swiper-button-prev.swiper-button-disabled {
            opacity: 0;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: '';
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: '';
        }

        .swiper-button-next,
        .swiper-rtl .swiper-button-prev {
            right: var(--swiper-navigation-sides-offset, 10px);
            left: auto;
        }

        .swiper-button-next,
        .swiper-button-prev {
            position: absolute;
            top: var(--swiper-navigation-top-offset, 50%);
            width: 35px;
            height: 35px;
            margin-top: calc(0px -(var(--swiper-navigation-size) / 2));
            z-index: 10;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            background-color: white;
            border-radius: 100%
        }
    </style>
@endpush

<div class="swiper mySwiper h-[50vh] md:h-full rounded-2xl flex gap-4 w-full md:w-1/2 lg:w-2/3 lg:h-full">
    <div class="swiper-wrapper full-image-container w-full box-border ">
        @foreach ($product->images as $img)
            <div style="background-image: url({{ url($img->url) }})"
                class="swiper-slide w-full h-full bg-no-repeat bg-cover bg-center select-none ">
            </div>
        @endforeach
    </div>
    <div class="swiper-button-next select-none"> <img src="{{ URL::asset('assets/svg/arrow.svg') }}" alt=""></div>
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
