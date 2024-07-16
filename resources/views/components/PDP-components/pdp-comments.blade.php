<div class="pdp-comments">
    <div class="comments-title">
        <h3 class="text-2xl font-bold text-main-green">Comments ({{ count($product->reviews) }})</h3>
    </div>
    <div class="comment-list mt-8 grid gap-10 grid-cols-1 md:grid-cols-3">
        @foreach ($reviews as $review)
            <div class="">
                <div class="comment-info flex items-baseline gap-2">
                    <h4 class="text-main-green font-bold">{{ $review->user->full_name }}</h4>
                    <div class="author-rating flex items-center gap-1">
                        <p class="font-bold text-main-green text-[16px]">{{ $review->rating }}</p>
                        <img src="{{ URL::asset('assets/svg/rating.svg') }}" class="w-4" />
                    </div>
                </div>
                <p>{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>

    <div class="pagination text-2xl flex gap-2 mt-10 justify-center">
        <!-- Display previous page link if it exists -->
        @if ($currentPage > 2)
            <a href="{{ $reviews->url(1) }}#reviews" class="">1...</a>
        @endif

        @if ($previousPage)
            <a href="{{ $reviews->url($previousPage) }}#reviews">{{ $previousPage }}</a>
        @endif

        <!-- Display current page -->
        <div class="relative">
            <b class="text-main-green">{{ $currentPage }}</b>
            <div class="w-2 h-[2px] bg-main-green absolute bottom-1"></div>
        </div>

        <!-- Display next 3 pages -->
        @foreach ($nextPages as $page)
            @if ($page != $currentPage)
                <a href="{{ $reviews->url($page) }}#reviews">{{ $page }}</a>
            @endif
        @endforeach

    </div>
</div>
