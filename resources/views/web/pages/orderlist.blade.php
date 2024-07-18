@extends('layouts.main')

@section('title', 'Orders List page')

@section('content')
    <div class="admin__container min-h-[700px] h-screen mb-16 overflow-y-scroll">
        <div class="hi__div">
            {{-- <h1>Hi, Admin!</h1> --}}
            {{-- <button onclick="window.location='/createproduct'" class="admin__btn green">Add product</button> --}}
        </div>
        <button onclick="window.location='/adminproducts'" class="font-bold text-main-green"><- Back</button>
        <div class="flex flex-wrap pt-4 gap-4">
        @if (isset($orders) && $orders->isNotEmpty())
            @foreach ($orders as $order)
                <div class="w-[300px] border border-main-green rounded-2xl flex flex-col p-4 gap-1 text-main-green">
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Id:</h4>
                        <p>{{$order->id}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Total:</h4>
                        <p>{{$order->totalCost}} €</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Delivery:</h4>
                        <p>{{$order->deliveryCost}} €</p>
                    </div>
                    <hr class="pt-2" />
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Name:</h4>
                        <p>{{$order->fullName}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">City:</h4>
                        <p>{{$order->city}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Address:</h4>
                        <p>{{$order->address}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Comment:</h4>
                    </div>
                    <div class="flex justify-between items-center text-right">
                        <p>{{$order->comment}}</p>
                    </div>
                    <hr class="pt-2" />
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Delivery:</h4>
                        <p>{{$order->deliveryMethod}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Place:</h4>
                        <p>{{$order->deliveryPlace}}</p>
                    </div>
                    <hr class="pt-2" />
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Payment:</h4>
                        <p>{{$order->paymentMethod}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h4 class="font-bold">Status:</h4>
                        <p>{{$order->status}}</p>
                    </div>


                    <button onclick="window.location='/orders/{{$order->id}}'" class="font-bold pt-4">Order details -></button>
                </div>

                    {{-- <div class="table__row">
                        <div class="table__head__left">
                            <h6 class="table__checkbox"></h6>
                            <h6 class="table__photo"></h6>
                            <h6 class="table__name">{{ $product->name }}</h6>
                        </div>
                        <div class="table__head__right">
                            <h6 class="table__date">{{ $product->created_at }}</h6>
                            <h6 class="table__price">{{ $product->price }}</h6>
                            <h6 class="table__edit"></h6>
                        </div>
                    </div> --}}
            @endforeach
        @else
            <p class="mt-10vh text-3xl text-center text-gray-700" style="justify-self: center;">
                You have no orders yet. Feel free to find some products on our store :)
            </p>
        @endif
    </div>
    @push('scripts')
        <script src="js/admin/admin.js"></script>
    @endpush
@endsection
