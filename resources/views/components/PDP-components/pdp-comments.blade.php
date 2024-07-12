<div class="pdp-comments">
    <div class="comments-title">
        <h3 class="text-2xl font-bold text-main-green">Comments ({{ count($comments) }})</h3>
    </div>
    <div class="comment-list mt-4 flex flex-col gap-8">
        @foreach ($comments as $comment)
            <div class="">
                <div class="comment-info flex items-baseline gap-2">
                    <h4 class="text-main-green font-bold">{{ $comment->author }}</h4>
                    <div class="author-rating flex items-center gap-1">
                        <p class="font-bold text-gold text-lg">{{ $comment->rating }}</p>
                        <img src="assets/svg/rating.svg" />
                    </div>
                </div>
                <p>{{ $comment->comment }}</p>
            </div> 
        @endforeach
    </div>
</div>
