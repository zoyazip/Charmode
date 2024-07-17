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
        {{-- <p>{{$product->id}}</p> --}}

        <div class="delete__row">
            <div>Review id</div>
            <div>Author</div>
            <div>Rating</div>
            <div>Comment</div>
            <div>Delete</div>
        </div>
        @if(sizeof($product->reviews) > 0)
        @foreach($product->reviews as $review)
        <div class="delete__row">
            <div>{{$review->id}}</div>
            <div>{{$review->user->full_name}}</div>
            <div>{{$review->rating}}</div>
            <div>{{$review->comment}}</div>
            <form method="GET" action="/reviews/delete/{{$review->id}}">
                @csrf
                <input type="submit" value="Delete review">
            </form>
        </div>
        @endforeach
        @endif
        {{-- <a href="/adminproducts/delete/{{$product->id}}" >Delete Review</a> --}}
        <form method="GET" action="/adminproducts/delete/{{$product->id}}">
            @csrf
            <input type="submit" value="Delete product">
        </form>
        {{-- <button onclick="window.location='/adminproducts/delete/{{$product->id}}'">To all orders</button> --}}


        
        {{-- @push('scripts')
            <!-- @once -->
                <script src="{{ URL::asset('js/admin/admin.js') }}"></script>
            <!-- @endonce -->
        @endpush --}}

        {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> --}}

    </div>
@endsection
