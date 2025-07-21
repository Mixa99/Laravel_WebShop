@extends('layouts.app')
    

@section('content')
<div class="content-size">
<h1 class="page-title">Vaša Korpa</h1> {{-- Dodao sam glavni naslov stranice --}}

@if($products->isEmpty())
    <p class="empty-cart-message">Nemate nijedan proizvod u korpi.</p>
@else
    
        <form action="{{ route('order.makeOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach ($products as $product)
                <div class="cart-item-container"> {{-- NOVI OMOTAJUĆI DIV ZA SVAKI PROIZVOD --}}
                    <div class="cart-item-header">
                        <h1>Product name: {{ $product->name }}</h1>
                        <input type="checkbox" name="selected[]" value="{{ $product->id }}">
                    </div>
                    <div class="cart-item-body"> {{-- NOVI DIV ZA TELO PROIZVODA --}}
                        <img src="{{ asset($product->path) }}" alt="{{ $product->name }}">
                        <div class="product-details">
                            <h5>Product ID: {{ $product->id }}</h5>
                            <h3>Product price: {{ number_format($product->price, 2) }} RSD</h3> {{-- Formatiranje cene --}}
                            <p>Product quantity: {{ $product->quantity }}</p>
                            <a href="{{ route('cart.remove', ['id' => $product->id]) }}" class="remove-from-cart">Ukloni iz korpe</a>
                        </div>
                    </div>
                </div> {{-- KRAJ cart-item-container --}}
            @endforeach

            <button type="submit" class="checkout-button">Plati izabrane proizvode</button>
        </form>
    </div>
@endif
@endsection