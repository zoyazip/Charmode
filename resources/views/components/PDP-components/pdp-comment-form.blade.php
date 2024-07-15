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

    div.stars {
        width: 270px;
        display: inline-block;
    }
    input.star { display: none; }
    label.star {
        float: right;
        padding-left: 5px;
        padding-right: 5px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }
    input.star:checked ~ label.star:before {
        content: '\f005';
        color: var(--text-primary);
        transition: all .25s;
    }
    input.star-5:checked ~ label.star:before {
        color: var(--text-primary);
    }
    input.star-1:checked ~ label.star:before { color: var(--text-primary); }
    label.star:hover { transform: rotate(-15deg) scale(1.3); }
    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }   
</style>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<div class="pdp-comment-form w-full md:w-1/2">
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
                    <div class="">
                        <input class="star star-5" id="star-5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1"></label>
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

