@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.frontend.inc.slider')

    {{-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <h2 class="col-md-4 mt-5 mb-5 text-center">Features Products</h2>
                <div class="col-md-4"></div>
            </div>
            <div class="row text-center justify-content-center">
                @foreach($featured_products as $featured_product)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'. $featured_product->image) }}" class="m-auto w-100" width="250" height="250" alt="">
                                <h3 class="card-body">{{ $featured_product->name }}</h3>
                                <p class="card-body">Price : {{ $featured_product->selling_Price }}$</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-5">
                    <h2 class="text-center">Featured Products</h2>
                </div>
                <div class="col-md-4"></div>
                    <div class="owl-carousel owl-theme">
                        @foreach($featured_products as $featured_product)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/'. $featured_product->image) }}" alt="Product Image">
                                    <h3 class="card-body">{{ $featured_product->name }}</h3>
                                    <p class="card-body">Price : {{ $featured_product->selling_Price }}$ <span class="originalPrice">{{ $featured_product->original_Price }}$</span> </p>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
@endsection
