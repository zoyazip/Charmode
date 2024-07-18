<div class="success relative bg-main-green rounded-2xl w-full max-w-[480px] pt-10 pb-14 px-10 flex flex-col justify-center items-center">
    <div class="flex flex-col items-center gap-4">
        <div class="bg-white w-20 h-20 rounded-full flex justify-center">
            <img src="{{ URL::asset('assets/svg/check-green.svg') }}" alt="check" class="w-10 inline-block" />
        </div>
        <h4 class="text-white font-medium text-lg">Payment Successful</h4>
        <h4 class="text-white font-bold text-4xl">1230 €</h4>
    </div>
    <div class="w-full h-[1px] bg-slate-300 my-4"></div>
    <div class="flex flex-col items-center w-full gap-2">
        <div class="flex justify-between w-full text-white">
            <h4>Ref Number</h4>
            <h4>9023402</h4>
        </div>
        <div class="flex justify-between w-full text-white">
            <h4>Date</h4>
            <h4>25-02-2024, 13:22:16</h4>
        </div>
        <div class="flex justify-between w-full text-white">
            <h4>Method</h4>
            <h4>Swedbank</h4>
        </div>
        <div class="flex justify-between w-full text-white">
            <h4>Customer</h4>
            <h4>Denis Chernov</h4>
        </div>
    </div>
    <div class="w-full h-[1px] bg-slate-300 my-4"></div>
    <div class="flex flex-col items-center w-full gap-2">
        <div class="flex justify-between w-full text-white">
            <h4>Amount</h4>
            <h4>123 €</h4>
        </div>
        <div class="flex justify-between w-full text-white">
            <h4>Fee</h4>
            <h4>21%</h4>
        </div>
    </div>
    <div class="circles flex gap-4 absolute -bottom-6 overflow-hidden">
        @foreach(range(1, 7) as $index)
            <div class="circle w-12 h-12 rounded-full bg-white"></div>
        @endforeach
    </div>
</div>