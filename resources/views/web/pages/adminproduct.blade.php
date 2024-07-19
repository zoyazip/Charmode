@extends('layouts.main')

@section('title', 'One product page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
@endpush

@section('content')
    <div class="inner-container">
        <div class="header-navigation flex justify-between">
            <button onclick="window.location='/adminproducts'" class="flex items-center gap-2">
                <div class="rotate-180 inline-block"><img src="{{ URL::asset('assets/svg/arrow.svg') }}" alt="arrow" /></div>
                <span>Back<span>
            </button>
            <div class="flex items-center gap-4">
                <button onclick="window.location='/adminproducts/edit/{{ $product->id }}'"><span class="px-4 py-2 rounded-lg bg-main-green text-white flex hover:drop-shadow-lg transition-all">Edit product</span></button>
                <div class="">
                    <form method="GET" action="/adminproducts/delete/{{ $product->id }}">
                        @csrf
                        <input type="submit" value="Delete">
                        </input>
                    </form>
                </div>
            </div>
        </div>
        <div class="pt-10 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-3">
            <div class="item-name border border-main-green lg:col-span-2 p-4 rounded-xl flex flex-col gap-1">
                <h3 class="text-2xl font-bold text-main-green">{{ $product->name }}</h3>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Product code:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->product_code }}</h4>
                </div>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Category:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->subCategory->category->name }}</h4>
                </div>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Subcategory:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->subCategory->name }}</h4>
                </div>
            </div>
            <div class="item-price border border-main-green rounded-xl flex flex-col gap-1 lg:col-span-2 p-4 ">
                <h4 class="font-bold text-main-green">Price Data:</h4>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Old price:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->oldPrice }}</h4>
                </div>
                <div class="flex justify-between">
                    <h4 class="text-main-green">New price:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->newPrice }}</h4>
                </div>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Discount:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->discount }}</h4>
                </div>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Stock quantity:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->stockQuantity }}</h4>
                </div>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Shipping cost:</h4>
                    <h4 class="font-bold text-main-green">{{ $product->shippingCost }}</h4>
                </div>
            </div>
            <div class="item-spec border border-main-green rounded-xl flex flex-col gap-1 lg:col-span-2 lg:row-span-2 p-4">
                <h4 class="font-bold text-main-green">Specifications:</h4>
                <div class="flex justify-between">
                    <h4 class="text-main-green">Colors:</h4>
                    <div class="product-color__div flex gap-2">
                        @if (isset($product->productColors))
                            @foreach ($product->productColors as $color)
                                <div style="background-color: {{$color->color->hex}};" class="w-6 h-6 rounded-full {{ $color->color->hex === '#ffffff' ? 'border' : '' }}"></div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="product-specification__div flex flex-col gap-1">
                    @if(sizeof($product->specifications) > 0)
                        @foreach($product->specifications as $specification)
                            <div class="flex justify-between">
                                <h4 class="text-main-green">{{ ucfirst($specification->key) }}</h4>
                                <h4 class="font-bold text-main-green">{{ $specification->value }}</h4>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="item-description border border-main-green rounded-xl flex flex-col gap-1 md:col-span-3 lg:col-span-4 p-4">
                <h4 class="font-bold text-main-green">Description: </h4>
                <p>{{$product->description}}</p>
            </div>
            @if(sizeof($product->images) > 0)
                @foreach($product->images as $image)
                    <div class="item-pic border border-main-green rounded-xl flex flex-col gap-1 col-span-1 p-4 mb-10">
                        <img src="/{{$image->url}}">
                    </div>  
                @endforeach
            @endif

        </div>
        @if(sizeof($product->reviews) > 0)
        <div class="comments-container my-10 overflow-x-scroll md:overflow-x-auto">
            <div class="w-[1000px] md:w-full">
            <h4 class="font-bold text-main-green">Product reviews:</h4>
            <div class="review__row">
                <div class="row__div font-medium">Review id</div>
                <div class="row__div font-medium">Author</div>
                <div class="row__div font-medium">Rating</div>
                <div class="row__div ">Comment</div>
                <div class="row__div row__div_right font-medium">Action</div>
            </div>
            <div class="">
                @foreach($product->reviews as $review)
                    <div class="review__row py-5">
                        <div class="row__div">{{ $review->id }}</div>
                        <div class="row__div">{{ $review->user->full_name }}</div>
                        <div class="row__div">{{ $review->rating }}</div>
                        <div class="row__div">{{ $review->comment }}</div>
                        <form class="row__div row__div_right" method="GET" action="/reviews/delete/{{$review->id}}">
                            @csrf
                            <input type="submit" value="Delete">
                                {{-- <img src="{{ URL::asset('assets/svg/trash.svg') }}" alt="trash" class="inline-block"/> --}}
                            </input>
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        </div>
        
        @push('scripts')
                <script src="{{ URL::asset('js/admin/admin.js') }}"></script>
        @endpush

    </div>
@endsection
