@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.frontend.inc.slider')
    <!-- Featured Products sec-->
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
                                <a href="{{ route('showProduct', $featured_product->id) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/products/'. $featured_product->image) }}" alt="Product Image">
                                        <h3 class="card-body">{{ $featured_product->name }}</h3>
                                        <p class="card-body">Price : {{ $featured_product->selling_Price }}$ <span class="originalPrice">{{ $featured_product->original_Price }}$</span> </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Categories sec -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-5">
                    <h2 class="text-center">Trending categories</h2>
                </div>
                <div class="col-md-4"></div>
                    <div class="owl-carousel owl-theme">
                        @foreach($trending_categories as $trending_category)
                            <div class="item">
                                <a href="{{ route('showCategory', $trending_category->slug) }}"><!-- We used 'slug' instead of id because of languages and also the slug is unique. -->
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/categories/'. $trending_category->image) }}" alt="Product Image">
                                    <h3 class="card-body">{{ $trending_category->name }}</h3>
                                    <p>{{ $trending_category->description }}</p>
                                </div>
                                </a>
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
