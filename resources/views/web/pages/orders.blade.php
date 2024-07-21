@extends('layouts.main')

@section('title', 'Orders List page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css\pages\orders\orders.css') }}">
@endpush

@php
    // Styling for Payment status depending of response

    $payment_status = 'failure';
    $payment_status_styling = 'text-green-400';

    switch ($payment_status) {
        case 'failure':
            $payment_status_styling = 'text-red-400';
            break;

        case 'confirmed':
            $payment_status_styling = 'text-green-400';
            break;

        case 'pending':
            $payment_status_styling = 'text-yellow-400';
            break;

        default:
            $payment_status_styling = 'text-gray-300';
            break;
    }

@endphp

@php

    // Styling for Status depending of response

    $status = 'confirmed';
    $status_styling = 'text-green-400';

    switch ($status) {
        case 'failure':
            $status_styling = 'text-red-400';
            break;

        case 'confirmed':
            $status_styling = 'text-green-400';
            break;

        case 'pending':
            $status_styling = 'text-yellow-400';
            break;

        default:
            $status_styling = 'text-gray-300';
            break;
    }

@endphp

@section('content')
    <div class="order__page-layout min-h-[600px]">
        <h1>Your Orders</h1>
        {{-- @if (isset($orders) && $orders->isNotEmpty()) --}}
        {{-- @foreach ($orders as $order) --}}
        {{-- {{ $order }} --}}
        {{-- <div class="order-container">
                    <div class="order__conteiner-upper">
                        <div class="order__conteiner-left">
                            <div>
                                <p class="order__text-upper">Order ID</p>
                                <p class="order__text-lower">{{ $order->id }}</p>
                            </div>
                            <div>
                                <p class="order__text-upper">Tracking No.</p>
                                <p class="order__text-lower">{{ $order->trackingNumber }}</p>
                            </div>
                            <div>
                                <p class="order__text-upper">Customer</p>
                                <button class="order__text-lower customer" onclick="copy(event)">
                                    {{ $order->user->email }}
                                    <img src="{{ URL::asset('assets\svg\copy.svg') }}" alt="copy">
                                </button>
                            </div>
                        </div>
                        <div class="order__conteiner-right">
                            <button class="order__button-payment {{ $order->paymentSuccess ? 'success' : 'failure' }}">
                                Payment: {{ $order->paymentSuccess ? 'success' : 'failure' }}
                            </button>
                            <button class="order__button-status">
                                Status: {{ $order->status }}
                            </button>
                            <button class="order__button-ordered">
                                Ordered: {{ $order->created_at }}
                            </button>
                        </div>
                    </div>

                    <div class="order__container-lower">
                        @php
                            $totalCostWithoutDiscount = 0;
                            $discount = 0;
                            $shipping = 0;
                        @endphp
                        @foreach ($order->orderItems as $orderItems)
                            <div class="order__product-container">

                                <img src="{{ URL::asset($orderItems->product->images[0]->url) }}"
                                    alt="image-{{ $orderItems->product->id }}" class="order__item-image">

                                <div class="order__product-information">
                                    <span class="order__information-upper">
                                        {{ $orderItems->product->name }}
                                    </span>

                                    <div class="order__information-lower">
                                        <div>
                                            <p class="order__text-upper">Quantity:</p>
                                            <b>{{ $orderItems->quantity }}</b>
                                        </div>
                                        <div>
                                            <p class="order__text-upper">Selected Color:</p>
                                            <b>{{ $orderItems->color->name }}</b>
                                        </div>
                                        <div>
                                            <p class="order__text-upper">Delivery:</p>
                                            <b>{{ $orderItems->product->shippingCost > 0 ? $orderItems->product->shippingCost . '€' : 'free' }}</b>
                                        </div>
                                        <div>
                                            <p class="order__text-upper">Total Price:</p>
                                            <div style="gap: 5px">
                                                <b>{{ $orderItems->newPrice }}€</b>
                                                <span class="order__discount">{{ $orderItems->oldPrice }}€</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $totalCostWithoutDiscount += $orderItems->oldPrice * $orderItems->quantity;
                                $discount += ($orderItems->oldPrice - $orderItems->newPrice) * $orderItems->quantity;
                                $shipping +=
                                    $orderItems->product->shippingCost > 0
                                        ? $orderItems->product->shippingCost * $orderItems->quantity
                                        : 0;
                            @endphp
                        @endforeach
                        
                        <div class="order__container-summary">
                            <div class="order__summary-row">
                                <p>Subtotal:</p>
                                <p>{{ $totalCostWithoutDiscount }}€</p>
                            </div>
                            @if ($discount)
                                <div class="order__summary-row">
                                    <p>Discount:</p>
                                    <p style="color: var(--green)">-{{ $discount }}€</p>
                                </div>
                            @endif
                            <div class="order__summary-row">
                                <p>Shipping:</p>
                                <p>{{ $shipping }}€</p>
                            </div>
                            <div class="order__summary-row">
                                <b>Total:</b>
                                <b>{{ $totalCostWithoutDiscount + $shipping - $discount }}€</b>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>You have no orders yet. Feel free to find some products on our store</p>
        @endif --}}

        <div class="orders overflow-x-scroll lg:overflow-x-visible w-full">
            <div class="w-[1000px] lg:w-full">
                {{-- Table Titles --}}
                <ul class="order-titles w-full grid grid-cols-6 gap-4 text-gray-300 px-5">
                    <li>Order ID</li>
                    <li>Tracking Nr.</li>
                    <li>Customer</li>
                    <li>Payment Status</li>
                    <li>Status</li>
                    <li>Order Date</li>
                </ul>
                <ul class="orders w-full pt-4 flex flex-col gap-3">
                    {{-- First Order --}}
                    <li class="order-0 w-full px-5 py-4 rounded-lg border-[1px] border-gray-300 flex flex-col gap-7">
                        {{-- Order Detail List --}}
                        <ul class="w-full grid grid-cols-6 gap-4 font-medium">
                            <li>7</li>
                            <li>1231444214</li>
                            <li>Denis Chernov</li>
                            <li class="{{ $payment_status_styling }}">Failure</li>
                            <li class="{{ $status_styling }}">Confirmed</li>
                            <li class="flex justify-between">
                                <span>2024-07-21 17:06:02</span>
                                <img id="0" src="{{ URL::asset('assets/svg/arrow.svg') }}" alt="Open"
                                    class="order-dd rotate-90" onclick="fn(event, 0)" />
                            </li>
                        </ul>
                        {{-- Order Product description List --}}
                        <ul id="order-desc-0" class="product-desc-list flex flex-col gap-4 hidden">
                            {{-- Every <li> tag in this container is order's product --}}
                            <li>
                                <ul class="w-full grid grid-cols-6 gap-4">
                                    <li></li>
                                    <li class="flex gap-4 items-center font-bold">
                                        <img src="{{ URL::asset('assets\webp\products\zenith\zenith_1.webp') }}"
                                            alt="pic" class="w-10 h-10 rounded-full" />
                                        <span>Luna</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Qty:</span>
                                        <span class="font-bold">12</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Color:</span>
                                        <span class="font-bold">Blue</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Delivery:</span>
                                        <span class="font-bold">3.95€</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Total price:</span>
                                        <span class="font-bold">395€</span>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="w-full grid grid-cols-6 gap-4">
                                    <li></li>
                                    <li class="flex gap-4 items-center font-bold">
                                        <img src="{{ URL::asset('assets\webp\products\zenith\zenith_1.webp') }}"
                                            alt="pic" class="w-10 h-10 rounded-full" />
                                        <span>Luna</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Qty:</span>
                                        <span class="font-bold">12</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Color:</span>
                                        <span class="font-bold">Blue</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Delivery:</span>
                                        <span class="font-bold">3.95€</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Total price:</span>
                                        <span class="font-bold">395€</span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- Second Order --}}

                    <li class="order-1 w-full px-5 py-4 rounded-lg border-[1px] border-gray-300 flex flex-col gap-7">
                        {{-- Order Detail List --}}
                        <ul class="w-full grid grid-cols-6 gap-4 font-medium">
                            <li>7</li>
                            <li>1231444214</li>
                            <li>Denis Chernov</li>
                            <li class="{{ $payment_status_styling }}">Failure</li>
                            <li class="{{ $status_styling }}">Confirmed</li>
                            <li class="flex justify-between">
                                <span>2024-07-21 17:06:02</span>
                                <img id="1" src="{{ URL::asset('assets/svg/arrow.svg') }}" alt="Open"
                                    class="order-dd rotate-90" onclick="fn(event, 1)" />
                            </li>
                        </ul>
                        {{-- Order Product description List --}}
                        <ul id="order-desc-1" class="product-desc-list flex flex-col gap-4 hidden">
                            {{-- Every <li> tag in this container is order's product --}}
                            <li>
                                <ul class="w-full grid grid-cols-6 gap-4">
                                    <li></li>
                                    <li class="flex gap-4 items-center font-bold">
                                        <img src="{{ URL::asset('assets\webp\products\zenith\zenith_1.webp') }}"
                                            alt="pic" class="w-10 h-10 rounded-full" />
                                        <span>Luna</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Qty:</span>
                                        <span class="font-bold">12</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Color:</span>
                                        <span class="font-bold">Blue</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Delivery:</span>
                                        <span class="font-bold">3.95€</span>
                                    </li>
                                    <li class="flex items-center gap-4">
                                        <span class="text-gray-300">Total price:</span>
                                        <span class="font-bold">395€</span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Script for showing and hiding sub-list
        const fn = (event, id) => {
            const orderDesc = document.querySelector(`.order-${id}`).querySelector(`#order-desc-${id}`)
            orderDesc.classList.toggle('hidden')
            console.log(orderDesc)
        }
    </script>
@endpush

@push('scripts')
    <script src="js/admin/admin.js"></script>
    <script>
        const copy = (e) => {
            navigator.clipboard.writeText(e.target.innerText)
        }
    </script>
@endpush
