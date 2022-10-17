@extends('layouts.front')

@section('title')
    E-shop - Categories
@endsection

@section('content')
<!-- Featured Products sec-->
<div class="py-5">
    <div class="container">
        <h1>Category : {{$category->name}}</h1>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-5">
                <h2 class="text-center">Products related to this category</h2>
            </div>
            <div class="col-md-4"></div>
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'. $product->image) }}" alt="Product Image">
                                <h3 class="card-body">{{ $product->name }}</h3>
                                <p class="card-body">Price : {{ $product->selling_Price }}$ <span class="originalPrice">{{ $product->original_Price }}$</span> </p>
                            </div>
                        </div>
                    @endforeach
        </div>
    </div>
</div>
@endsection
