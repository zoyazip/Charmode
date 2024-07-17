<div class="product-card-delivery-badge {{ isset($main) ? 'w-20 h-20' : 'w-12 h-12' }} bg-delivery-brown flex justify-center items-center flex-col rounded-full">
    <img src="{{ URL::asset('assets/svg/truck-badge.svg') }}" class="{{ isset($main) ? 'w-8' : 'w-5' }}" />
    <h3 class="text-dark-brown {{ isset($main) ? 'text-sm' : 'text-[10px]' }} font-bold">Free</h3>
</div>