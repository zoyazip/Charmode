<div class="pdp-characteristics mt-10 md:mt-0 w-full md:w-1/2 lg:w-1/3">
    <div class="characteristics-title">
        <h3 class="font-bold text-2xl text-main-green">Characteristics</h3>
    </div>
    <div class="characteristics-list mt-2 flex flex-col md:w-full ">
        @foreach ($product1->characteristics as $key => $value)
            <div class="w-full flex flex-col gap-2 ">
                <div class="characteristic mt-2 flex justify-between px-2">
                    <p class="text-main-grey">{{ $key }}</p>
                    <h3 class="font-bold text-main-green">{{ $value }}</h3>
                </div>
                <hr class="border-slate-300">
            </div>
        @endforeach
    </div>
</div>

{{-- <script>
    const showMoreBtn = document.querySelector('.show-more-characteristics-btn')
    const charList = document.querySelector('.characteristics-list')
    const listChilElementCount = charList.childElementCount

    if (listChilElementCount > 5) {
        charList.classList.add('h-1/3')
        charList.classList.add('overflow-y-scroll')
    }

</script> --}}
