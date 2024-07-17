@extends('layouts.main')

@section('title', 'One product page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
@endpush

@section('content')
    <div class="inner-container">
        <h1>Hi, Admin!</h1>
        <button onclick="window.location='/adminproducts'">To all products</button>
        <button onclick="window.location='/adminproducts/edit/{{$product->id}}'">Labot</button>
        <p>{{$product->id}}</p>
        <form method="GET" action="/adminproducts/delete/{{$product->id}}">
            <input type="submit">
        </form>
        {{-- <button onclick="window.location='/adminproducts/delete/{{$product->id}}'">To all orders</button> --}}


        
        @push('scripts')
            <!-- @once -->
                <script src="{{ URL::asset('js/admin/admin.js') }}"></script>
            <!-- @endonce -->
        @endpush

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    </div>
@endsection
