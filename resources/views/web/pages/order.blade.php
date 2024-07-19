@extends('layouts.main')

@section('title', 'Order page')

@section('content')
    <div class="admin__container">
        <div class="hi__div">
            {{-- <h1>Hi, Admin!</h1> --}}
            {{-- <button onclick="window.location='/createproduct'" class="admin__btn green">Add product</button> --}}
        </div>
        <button onclick="window.location='/orders'"><- To all orders</button>
        @if (isset($order))
        <div class="pt-6 w-[400px] text-main-green flex flex-col gap-4">
            <div class="flex w-full justify-between">
                <p class="font-bold">Order ID: </p>
                <p>{{$order->id}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">User email: </p>
                <p>{{$order->email}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Total cost: </p>
                <p>{{$order->totalCost}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Delivery cost: </p>
                <p>{{$order->deliveryCost}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">City: </p>
                <p>{{$order->deliveryCost}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Order City: </p>
                <p>{{$order->city}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Address: </p>
                <p>{{$order->address}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Comment: </p>
                <p>{{$order->comment}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Delivery method: </p>
                <p>{{$order->deliveryMethod}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Delivery place: </p>
                <p>{{$order->deliveryPlace}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Payment method: </p>
                <p>{{$order->paymentMethod}}</p>
            </div>
            <div class="flex w-full justify-between">
                <p class="font-bold">Status: </p>
                <p>{{$order->status}}</p>
            </div>

            <div class="w-full ">
                <h4 class="font-bold">Ordered products:</h4>
                @foreach ($order->orderItems as $item)
                    <p>Product ID: {{$item->product_id}}</p>
                    <p>Color: {{$item->color->hex}}</p>
                    <p>Quantity: {{$item->quantity}}</p>
                @endforeach
                <form method="POST" action="/orders/update/{{$order->id}}" >
                    @csrf
                    <input placeholder="New status*" class="@error('status') is-invalid @enderror add__input add-product__name__input" type="text" name="status" value="{{ old('status') }}">
                       @error('status')
                            <p class="admin__error">{{ $message }}</p>
                        @enderror
                    <input type="submit" value="Update status ->" class="font-bold cursor-pointer">
                </form>
                    @endif
            </div>
            
        </div>
        
    </div>
    @push('scripts')
        <script src="js/admin/admin.js"></script>
    @endpush
@endsection
