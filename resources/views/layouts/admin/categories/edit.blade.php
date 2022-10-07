@extends('layouts.admin.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('categories') }}">Categories</a></li>
              <li class="breadcrumb-item active"><span>Edit Category</span></li>
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
                    <h4>Edit Category : {{ $category->name }}  </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="{{old('name',$category->name)}}" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{old('slug',$category->slug)}}" class="form-control" name="slug" id="slug">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="descriptio">Descriptio</label>
                                <textarea name="description"
                                    id="description" rows="5" class="form-control">{{old('description',$category->description)}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" {{$category->status == '1' ? 'checked' : '' }} name="status" id="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="popular">Popular</label>
                                <input type="checkbox" {{$category->popular == '1' ? 'checked' : '' }} name="popular" id="popular">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="metaTitle">Meta Title</label>
                                <textarea name="meta_title"
                                    id="metaTitle" rows="5" class="form-control">{{old('meta_title',$category->meta_title)}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_descrip">Meta Descriptio</label>
                                <textarea name="meta_descrip"
                                    id="meta_descrip" rows="5" class="form-control">{{old('meta_descrip',$category->meta_descrip)}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea name="meta_keywords"
                                    id="meta_keywords" rows="5" class="form-control">{{old('meta_keywords',$category->meta_keywords)}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                @if($category->image)
                                    <img src="{{ asset('assets/uploads/categories/'. $category->image) }}" width="100" height="100" alt="">
                                @endif
                                <label for="image">Image</label>
                                <input type="file" value="{{old('image',$category->image)}}" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Edit</button>
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
