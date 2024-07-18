@extends('layouts.main')

@section('title', 'success')

@section('content')

    <div class="error-container flex flex-col items-center gap-10 py-10">
        <div class="error-img">
            {{-- <img src="{{ URL::asset('assets/error.png') }}" /> --}}
        </div>
        <div class="error-text flex flex-col items-center">
            <h2 class="font-bold text-main-green text-2xl">Great!</h2>
            <h4>Checkout done and your products are on their way!</h4>
            <h4>Your total is {{$totalCost}}</h4>
            <h4>Payment method: {{$payMethod}}</h4>
        </div>
    </div>
@endsection
