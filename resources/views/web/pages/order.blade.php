@extends('layouts.main')

@section('title', 'Order page')

@section('content')
    <div class="admin__container">
        <div class="hi__div">
            <h1>Hi, Admin!</h1>
            {{-- <button onclick="window.location='/createproduct'" class="admin__btn green">Add product</button> --}}
        </div>
        <button onclick="window.location='/orders'">To all orders</button>
        @if (isset($order))
        <p>Order ID: {{$order->id}}</p>
        <p>User email: {{$order->email}}</p>
        <p>Total cost: {{$order->totalCost}}</p>
        <p>Delivery cost{{$order->deliveryCost}}</p>
        <p>City: {{$order->city}}</p>
        <p>Address: {{$order->address}}</p>
        <p>Comment: {{$order->comment}}</p>
        <p>Delivery method: {{$order->deliveryMethod}}</p>
        <p>Delivery place: {{$order->deliveryPlace}}</p>
        <p>Payment method: {{$order->paymentMethod}}</p>
        <p>Status: {{$order->status}}</p>
        <h4>Ordered products:</h4>
        @foreach ($order->orderItems as $item)
            <p>Product ID: {{$item->product_id}}</p>
            <p>Color: {{$item->color->hex}}</p>
            <p>Quantity: {{$item->quantity}}</p>
        @endforeach
        <form method="POST" action="/orders/update/{{$order->id}}">
            @csrf
            <input placeholder="New status*" class="@error('status') is-invalid @enderror add__input add-product__name__input" type="text" name="status" value="{{ old('status') }}">
               @error('status')
                    <p class="admin__error">{{ $message }}</p>
                @enderror
            <input type="submit" value="Update status">
        </form>
            @endif
    </div>
    @push('scripts')
        <script src="js/admin/admin.js"></script>
    @endpush
@endsection
