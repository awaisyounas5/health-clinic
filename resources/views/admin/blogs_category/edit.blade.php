@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.blogs_category')}}">Blog Category</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Edit Blog Category</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Edit Blog Category Details</h4>
                    <form action="{{route('admin.blog_category.update',$blog_category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="label">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Blog Category Title" name="title" value="{{$blog_category->title}}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="label">Description</label>
                                <textarea class="form-control" placeholder="Enter Blog Category Description" name="description" rows="5" required>{{$blog_category->description}}</textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Blog Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
