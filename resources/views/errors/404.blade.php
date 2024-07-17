@extends('layouts.main')

@section('title', 'Error')

@section('content')

    <div class="error-container flex flex-col items-center gap-10 py-10">
        <div class="error-img">
            <img src="{{ URL::asset('assets/error.png') }}" />
        </div>
        <div class="error-text flex flex-col items-center">
            <h2 class="font-bold text-main-green text-2xl">Oops!</h2>
            <h4>Page Not Found</h4>
        </div>
    </div>
@endsection
