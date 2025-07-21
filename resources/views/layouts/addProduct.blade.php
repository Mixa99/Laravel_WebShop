@extends('layouts.app')

@section('content')
<div class="content-size">
  <div class="product-form">
    <h1 class="page-title">Kreiranje proizvoda</h1>  
      <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="product-input">
            <span class="icon"><i class='bx bxs-edit-alt' ></i></span>
            <input type="text" name="name" required>
            <label>Product name</label>
          </div>
          @if ($errors->has('name'))
            <span class="product-error">{{ $errors->first('name') }}</span>
          @endif

          <div class="product-input">
            <span class="icon"><i class='bx bxs-dollar-circle'></i></i></span>
            <input type="text" name="price" required>
            <label>Price</label>
          </div>
          @if ($errors->has('price'))
            <span class="product-error">{{ $errors->first('price') }}</span>
          @endif

          <div class="product-input">
            <span class="icon"><i class='bx bxs-category'></i></span>
            <input type="text" name="category" required>
            <label>Category</label>
          </div>
          @if ($errors->has('category'))
            <span class="product-error">{{ $errors->first('category') }}</span>
          @endif

          <div class="product-input">
            <span class="icon"><i class='bx bxs-plus-circle'></i></span>
            <input type="text" name="quantity" required>
            <label>Quantity</label>
          </div>
          @if ($errors->has('quantity'))
            <span class="product-error">{{ $errors->first('quantity') }}</span>
          @endif

          <div id="preview-container">
            <h3>Image Preview:</h3>
            <img id="preview" alt="Image Preview">
          </div>

          <div class="file-input">
            <input type="file" name="path" id="fileInput" required>
            <label for="fileInput">
              <span class="icon"><i class='bx bx-image'></i></span>
              Image
            </label>
          </div>
          @if ($errors->has('path'))
            <span class="product-error">{{ $errors->first('path') }}</span>
          @endif
          
          <button type="submit" class="submit-product">Submit</button>
      </form>
      @if (session('success'))
        <div class="product-success" >
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="product-error product-exists" >
          {{ session('error') }}
        </div>
      @endif
  </div>
</div>

@endsection










