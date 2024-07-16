<div class="pdp-comments">
    <div class="comments-title">
        <h3 class="text-2xl font-bold text-main-green">Comments ({{ count($product->reviews) }})</h3>
    </div>
    <div class="comment-list mt-8 grid gap-10 grid-cols-1 md:grid-cols-3">
        @foreach ($product->reviews as $comment)
            <div class="">
                <div class="comment-info flex items-baseline gap-2">
                    <h4 class="text-main-green font-bold">{{ $comment->user->full_name }}</h4>
                    <div class="author-rating flex items-center gap-1">
                        <p class="font-bold text-main-green text-[16px]">{{ $comment->rating }}</p>
                        <img src="{{ URL::asset('assets/svg/rating.svg') }}" class="w-4" />
                    </div>
                </div>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach
    </div>
    <div class="comments-pagination mt-4">
        <p><span class="underline">1</span> 2 3</p>
    </div>
</div>
