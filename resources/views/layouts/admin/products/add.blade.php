@extends('layouts.admin.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('addProduct') }}">Add Product</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <form action="{{ route('insertProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select class="custom-select" name="cate_id" aria-label="Default select example">
                                    <option value="">Select a category : </option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col-md-6 mb-3"></div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug">Small Description</label>
                                <input type="text" class="form-control" name="small_description" id="slug">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="descriptio">Descriptio</label>
                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Original Price</label>
                                <input type="number" name="original_Price" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Selling Price</label>
                                <input type="number" name="selling_Price" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Quantity</label>
                                <input type="number" name="quantity" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Tax</label>
                                <input type="number" name="tax" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Trending</label>
                                <input type="checkbox" name="trending" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="metaTitle">Meta Title</label>
                                <textarea name="mate_title" id="metaTitle" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_descrip">Meta Descriptio</label>
                                <textarea name="mate_description" id="meta_descrip" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea name="mate_keywords" id="meta_keywords" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
