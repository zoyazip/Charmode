<style>
    .comment-share-btn {
        color: var(--green);
        transition: all .2s;
        gap: 4px;
    }

    .share-comment-arrow {
        transition: all .2s;
    }

    .comment-share-btn:hover>.share-comment-arrow {
        transform: translateX(5px);
    }

    .comment-share-btn:hover {
        font-weight: 700;
    }
</style>

<div class="pdp-comment-form w-1/2">
    <div class="comment-form mt-4">
        <form class="flex flex-col gap-4">
            <textarea id="comment-form-area" name="comment"
                class="w-full h-full outline-none py-2 px-4 border border-main-green rounded-lg resize-none"
                placeholder="Share your thoughts with others..."></textarea>
            <div class="form-rate flex items-center justify-between gap-3 px-2">
                <div class="flex gap-4">
                    <div class="form-rate-title">
                        <p>Rate:</p>
                    </div>
                    <div class="rate-stars flex gap-3">
                        <img src="assets/svg/rating.svg" />
                        <img src="assets/svg/rating.svg" />
                        <img src="assets/svg/rating.svg" />
                        <img src="assets/svg/rating.svg" />
                        <img src="assets/svg/rating.svg" />
                    </div>
                </div>
                <div class="comment-send-btn">
                    <button type="submit" class="comment-share-btn flex">
                        <p>Share</p>
                        <p class="share-comment-arrow">-></p>
                    </button>
                </div>

            </div>

        </form>
    </div>
</div>
