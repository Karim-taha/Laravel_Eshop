@extends('layouts.front')

@section('title')
{{ $product->name }}
@endsection

@section('content')
<!-- Featured Products sec-->
{{-- <div class="py-5">
    <div class="container">
        <h1 class="card-body">{{ $product->name }}</h1>
        <h3>Category : {{$product->categories->name}}</h3>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-5"></div>
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/'. $product->image) }}" alt="Product Image">

                        <p class="card-body">Price : {{ $product->selling_Price }}$ <span class="originalPrice">{{ $product->original_Price }}$</span> </p>
                    </div>
                </div>
        </div>
    </div>
</div> --}}


<div style="font-size: 1.5rem" class="bg-warning p-3">Collections / {{ $product->categories->name}} / {{ $product->name }}</div>
<div class="col-lg-8 card mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 80%; margin:auto; margin-top:5rem;">
    <div class="row no-gutters">
      <div class="col-md-4">
          <img src="{{ asset('assets/uploads/products/'. $product->image) }}" class="card-img" alt="Product Image">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class=" mb-3">{{ $product->name }}</h3>
                    </div>
                    <div class="col-lg-6">
                        @if($product->trending == '1')
                        <span class="bg-danger mt-1" style="width: 5rem; padding-left:.5rem; padding-right:.5rem; float: right; ">Trending</span>
                        @endif
                    </div>
                </div>


                <hr style="margin-top: 1rem">
                <span class="card-text">Original Price : <span class=" text-danger" style="text-decoration: line-through">{{ $product->original_Price }}$</span></span>
                <span style="margin-left: 1.5rem; font-size:1.2rem" class="card-text">Seeling Price : {{ $product->selling_Price }}$</span>
                <p class="card-text">{{ $product->small_description }}</p>
                <hr style="margin-top: 1rem">
                @if($product->quantity > 0)
                <div class="bg-green" style="width:4.5rem; padding-left:.5rem">In Stock</div>
                @else
                <div class="bg-red" style="width:6rem; padding-left:.5rem">Out of Stock</div>
                @endif
                <span class="card-text"><small class="text-muted">Last updated 3 mins ago</small></span>
                <button class="btn btn-success mt-2 ml-5">Add to wish list <i class="fa-solid fa-heart pl-1"></i></button>
                <button class="btn btn-primary mt-2 ml-5">Add to cart <i class="fa-solid fa-cart-shopping pl-1"></i></button>
            </div>
        </div>
    </div>
</div>






{{-- <div class="row mt-5">
    <div class="col-lg-2 bg-red">1</div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-2"><img src="{{ asset('assets/uploads/products/'. $product->image) }}" width="300" height="200" alt="Product Image"></div>
                <div class="col-lg-2">Empty col</div>
                <div class="col-lg-8">{{ $product->name }}</div>
        </div>
    </div>
    <div class="col-lg-2 bg-red">3</div>
</div> --}}


@endsection

