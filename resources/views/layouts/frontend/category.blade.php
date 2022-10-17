@extends('layouts.front')

@section('title')
    E-shop - Categories
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-5">
                <h2 class="text-center">All Categories</h2>
            </div>
            <div class="col-md-4"></div>
                    @foreach($categories as $cat)
                    <div class="col-md-4">
                            <div class="card mb-5">
                                <img src="{{ asset('assets/uploads/categories/'. $cat->image) }}" alt="Product Image">
                                <h3 class="card-body">{{ $cat->name }}</h3>
                                <p>{{ $cat->description }}</p>
                            </div>
                        </div>
                        @endforeach
        </div>
    </div>
</div>
@endsection
