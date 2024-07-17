@extends('layouts.main')

@section('title', 'Orders List page')

@section('content')
    <div class="admin__container">
        <div class="hi__div">
            <h1>Hi, Admin!</h1>
            {{-- <button onclick="window.location='/createproduct'" class="admin__btn green">Add product</button> --}}
        </div>
        <button onclick="window.location='/adminproducts'">To all products</button>
        @if (isset($orders))
                @foreach ($orders as $order)
                <p>{{$order->id}}</p>
                <button onclick="window.location='/orders/{{$order->id}}'">Order details</button>
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
            @endif
    </div>
    <script src="js/admin/admin.js"></script>
@endsection
