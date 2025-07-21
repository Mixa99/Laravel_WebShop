@extends('layouts.app')

@section('content')
<div class="content-size">
    <h1 class="page-title">Vaše porudžbine</h1>

    @if($orders->isEmpty())
        <p class="empty-cart-message">Nemate nijednu porudžbinu.</p>
    @else
    @foreach ($orders as $order)
        <div class="order-container"> 
            <h2>Order #{{ $order->id }}</h2>
            <p>Status: <strong>{{ $order->status }}</strong></p>
            <p>Date of Delivery: <strong>{{ $order->date_of_delivery }}</strong></p>
            <p>Total Price: <strong>{{ number_format($order->total_price, 2) }} RSD</strong></p>

            <h3>Products</h3>
            <ul>
                @foreach ($order->items as $item)
                    <li>
                        <img src="{{ asset($item->product->path) }}" alt="{{ $item->product->name }}">
                        <div class="product-details">
                            <span>Product Name: {{ $item->product->name }}</span>
                            <span>Quantity Ordered: {{ $item->quantity }}</span>
                            <span>Product Price: {{ number_format($item->product->price, 2) }} RSD</span>
                            <span>Product Category: {{ $item->product->category }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div> 
    @endforeach
    @endif
</div>
@endsection