<style>
    /* width */
    .characteristics-list::-webkit-scrollbar {
        width: 5px;
        border-radius: 20px;
    }

    /* Track */
    .characteristics-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 20px;
    }

    /* Handle */
    .characteristics-list::-webkit-scrollbar-thumb {
        background: var(--text-primary);
        border-radius: 20px;
    }
</style>

<div class="pdp-characteristics mt-10 md:mt-0 w-full md:w-1/2 lg:w-1/3 h-[300px] relative">
    <div class="characteristics-title">
        <h3 class="font-bold text-2xl text-main-green">Characteristics</h3>
    </div>
    <div class="characteristics-list scroll-smooth mt-2 flex flex-col md:w-full relative h-full pr-3">
        @foreach ($product->specification as $spec)
            <div class="w-full flex flex-col gap-2 ">
                <div class="characteristic mt-2 flex justify-between px-2">
                    <p class="text-main-grey">{{ $spec->key }}</p>
                    <h3 class="font-bold text-main-green">{{ $spec->value }}</h3>
                </div>
                <hr class="border-slate-300">
            </div>
        @endforeach
    </div>
</div>

<script>

    const charList = document.querySelector('.characteristics-list')
    const listChilElementCount = charList.childElementCount

    charList.classList.toggle("overflow-y-scroll", listChilElementCount > 8)

</script>
