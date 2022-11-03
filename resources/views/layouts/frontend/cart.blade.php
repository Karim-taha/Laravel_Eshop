@extends('layouts.front')

@section('title')
    E-Shop | Cart
@endsection

@section('content')
    <div style="font-size: 1.5rem" class="bg-warning p-3">Collections / <a style="text-decoration: none" href="{{ route('home') }}">Home</a> / <a style="text-decoration: none" href="{{ route('showcart') }}">Cart</a></div>
    {{-- <div style="font-size: 1.5rem" class="bg-warning p-3">Collections / {{ $product->categories->name}} / {{ $product->name }}</div> --}}

    <div class="col-lg-8 card mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 80%; margin:auto; margin-top:5rem;">
        @if (session('status'))
    <h6 class="container-fluid alert alert-success">{{ session('status') }}</h6>
@endif
        @foreach ($cartItems as $item)
        <div class="row no-gutters product_data">
          <div class="col-md-4">
              <img src="{{ asset('assets/uploads/products/'. $item->products->image) }}" class="card-img" alt="Product Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class=" mb-3">{{ $item->products->name}}</h3>
                        </div>
                        <div class="col-lg-6">
                            @if($item->products->trending == '1')
                            <span class="bg-success rounded mt-1" style="width: 5rem; padding-left:.5rem; padding-right:.5rem; float: right; ">Trending</span>
                            @endif
                        </div>
                    </div>
                    <hr style="margin-top: 1rem">
                    <span class="card-text">Original Price : <span class=" text-danger" style="text-decoration: line-through">{{ $item->products->original_Price }}$</span></span>
                    <span style="margin-left: 1.5rem; font-size:1.2rem" class="card-text">Seeling Price : {{ $item->products->selling_Price }}$</span>
                    <p class="card-text">{{ $item->products->small_description }}</p>
                    <hr style="margin-top: 1rem">
                    {{-- @if($product->quantity > 0)
                    <div class="bg-green" style="width:4.5rem; padding-left:.5rem">In Stock</div>
                    @else
                    <div class="bg-red" style="width:6rem; padding-left:.5rem">Out of Stock</div>
                    @endif --}}
                    <div class="row mt-2">
                        <div class="col-lg-3">
                            <input type="hidden" value="" class="prod_id">
                            <div class="input-group text-center mb-3" style="width: 150px;">
                                <button class="input-group-text bg-danger decrement-btn"><i class="fa-solid fa-minus"></i></button>
                                <input type="text" name="quantity" class="form-control text-center qty-input" value="{{ $item->prod_qty }}">
                                <button class="input-group-text bg-success increment-btn"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            {{-- <button class="btn btn-primary addToCartBtn ml-5">Add to cart <i class="fa-solid fa-cart-shopping pl-1"></i></button> --}}
                            {{-- <form action="">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('deleteProductFromCart'), $item->prod_id }}" class="btn btn-danger ml-5">Remove </a>
                            </form> --}}


                            <form action="{{ route('deleteProductFromCart', $item->prod_id )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-5">Remove <i class="fa-solid fa-trash-can"></i></button>
                            </form>


                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    @endforeach
                </div>
@endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                $('.increment-btn').click(function(e) {
                    e.preventDefault();
                    var increment_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(increment_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value < 100)
                    {
                        value++;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                    }
                });
                $('.decrement-btn').click(function(e) {
                    e.preventDefault();
                    var decrement_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(decrement_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value > 1)
                    {
                        value--;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                    }
                });

                $('.addToCartBtn').click(function(e) {
                    e.preventDefault();
                    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                    var prod_qty = $(this).closest('.product_data').find('.qty-input').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: " {{ url('/addtocart') }}",
                        data: {
                            'prod_id': prod_id,
                            'prod_qty': prod_qty,
                        },
                        success: function(response){
                            alert(response.status);
                        },
                    });
                });

            });
        </script>
    @endsection





