@extends('layouts.admin.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
              <li class="breadcrumb-item active"><span>Edit Product</span></li>
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
                    <h4>Edit Product : {{ $product->name }}  </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select class="custom-select" name="cate_id" aria-label="Default select example">
                                    <label for="">Category</label>
                                    <option value="{{ $product->cate_id }}">{{ $product->categories->name }}</option>
                                  </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="{{old('name',$product->name)}}" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{old('slug',$product->slug)}}" class="form-control" name="slug" id="slug">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="descriptio">Description</label>
                                <textarea name="description"
                                    id="description" rows="5" class="form-control">{{old('description',$product->description)}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" {{$product->status == '1' ? 'checked' : '' }} name="status" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="trending">Trending</label>
                                <input type="checkbox" {{$product->trending == '1' ? 'checked' : '' }} name="trending" id="trending">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="metaTitle">Meta Title</label>
                                <textarea name="mate_title"
                                    id="metaTitle" rows="5" class="form-control">{{old('mate_title',$product->mate_title)}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_descrip">Meta Description</label>
                                <textarea name="mate_description"
                                    id="meta_descrip" rows="5" class="form-control">{{old('mate_description',$product->mate_description)}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea name="mate_keywords"
                                    id="meta_keywords" rows="5" class="form-control">{{old('mate_keywords',$product->mate_keywords)}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                @if($product->image)
                                    <img src="{{ asset('assets/uploads/products/'. $product->image) }}" width="100" height="100" alt="">
                                @endif
                                <input type="file" value="{{old('image' ,$product->image)}}" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Update</button>
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
