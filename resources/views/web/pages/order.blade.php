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
        <p>{{$order->id}}</p>
        <p>Status: {{$order->status}}</p>
        <form method="POST" action="/orders/update/{{$order->id}}">
            @csrf
            <input placeholder="New status*" class="@error('status') is-invalid @enderror add__input add-product__name__input" type="text" name="status" value="{{ old('status') }}">
               @error('status')
                    <p class="admin__error">{{ $message }}</p>
                @enderror
            <input type="submit" value="Update status">
        </form>
                {{-- @foreach ($products as $product)
                    <div class="table__row">
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
                    </div>
                @endforeach --}}
            @endif
    </div>
    @push('scripts')
        <script src="js/admin/admin.js"></script>
    @endpush
@endsection
