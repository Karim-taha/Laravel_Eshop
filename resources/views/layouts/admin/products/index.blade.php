@extends('layouts.admin.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (session('status'))
    <h6 class="container-fluid alert alert-success">{{ session('status') }}</h6>
@endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                    All products
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                              <th>Category</th>
                                <th>Selling Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->categories->name }}</td>
                                    <td>{{ $product->selling_Price}}</td>
                                    <td>
                                        <img src="{{ asset('assets/uploads/products/' . $product->image) }}" width="100" height="100" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('editProduct', $product->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('deleteProduct', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
