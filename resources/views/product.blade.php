@extends('layouts.app')

@include('layouts.comments')

@section('content')
<div class="content-size">
    <div class="main-product-container"> {{-- Glavni kontejner za celu stranicu proizvoda --}}

        <div class="product-info-box"> {{-- "Kvadrat" za sliku i osnovne podatke --}}
            <div class="product-image-display">
                <img class="product-main-image" src="{{ asset($product->path) }}" alt="{{ $product->name }}">
            </div>
            <div class="product-details-area">
                <h1 class="product-title">{{ $product->name }}</h1>
                <span class="product-price">{{ number_format($product->price, 2) }} <span class="currency">RSD</span></span>
                <p class="product-stock-quantity">Preostalo: <strong>{{ $product->quantity }}</strong> komada</p>
                
                <form method="post" action="{{ route('cart.add') }}" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="productId" value="{{$product->id}}">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-button">Ubaci u korpu</button>
                </form>
            </div>
        </div>

        {{-- Delovi za komentare - ostavljeni netaknuti za sada --}}
        <div class="comments-section-placeholder"> {{-- Nova klasa za placeholder --}}
            @if($comments->isnotEmpty())
                @yield('show-comments')
            @else
                <h2>Nema komentara</h2>
            @endif    
        </div>

        <div class="add-comment-section-placeholder"> {{-- Nova klasa za placeholder --}}
            @yield('add-comments')
        </div>

    </div>
</div>    
@endsection

