@extends('layouts.main')

@section('content')
    <div class="inner-container">
        <div class="plp-page-container">
            @include('components/filter')
            <div>
                <h1>Products</h1>
                {{-- @if (count($products) > 0)
                    @foreach ($products as $product)
                        <h2>{{$product->name}}</h2>
                    @endforeach
                @endif --}}
                <h1>Colors</h1>
                {{-- @if (count($colors) > 0)
                    @foreach ($colors as $color)
                        <h2>{{$color->color_name}}</h2>
                    @endforeach
                @endif --}}
            </div>
        </div>
    </div>
@endsection
