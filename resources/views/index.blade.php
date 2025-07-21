@extends('layouts.app')
    

@section('content')
<div class="content-size">
    <div class="header-div">
        <img class="header-image" src="{{ asset('storage/img/photo-via-apple-nqmzx.jpg') }}" />
        <p class="header-img-text">Novi iPhone 16 u ponudi</p>
    </div>
    
    <div>
        <div class="product-container">
            @foreach($products as $product)
            <div class="product-card">
                <a href="{{ route('product.show', ['id' => $product->id]) }}">
                    <img src="{{ asset($product->path) }}" class="product-card-img">
                </a>
                <div class="product-data">
                    <h3 class="product-name"> {{$product->name}} </h3>
                    <span class="price">{{ $product->price }}<span class="currency"> RSD</span></span>
                </div>
                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="product-details-button">Detalji</a>
            </div>
            @endforeach
            
        </div>
        {{ $products->links('pagination.custom-pagination') }}
    </div>
    
</div>

@endsection


