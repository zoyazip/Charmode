@extends('layouts.main')

@section('title', 'Orders List page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css\pages\orders\orders.css') }}">
@endpush

@section('content')
    <div class="order__page-layout">
        @if (isset($orders) && $orders->isNotEmpty())
            <h1>Your Orders</h1>
            @foreach ($orders as $order)
                {{-- {{ $order }} --}}
                <div class="order-container">
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
                                    $orderItems->product->shippingCost > 0 ? $orderItems->product->shippingCost : 0;
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
            <div class="no-orders">
                <b>You have no orders yet😔 <br> Feel free to find some products on our store</b>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="js/admin/admin.js"></script>
    <script>
        const copy = (e) => {
            navigator.clipboard.writeText(e.target.innerText)
        }
    </script>
@endpush
