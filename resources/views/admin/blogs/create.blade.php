@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.blogs')}}">Blogs</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Create Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Enter Blog Details</h4>
                    <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="form-group col-md-12">
                                <label class="label">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Blog Title" name="title" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group col-md-12">
                                <label class="label">Category</label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @if($blog_categories)
                                    @foreach ($blog_categories as $blog_category)
                                    <option value="{{$blog_category->id}}">{{$blog_category->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group col-md-12">
                                <label class="label">Description</label>
                                <textarea class="form-control" placeholder="Enter Blog Description" name="description" id="description" rows="5" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group col-md-12">
                                <label class="label">Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail" accept="image/*" required>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Create Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
                .create( document.querySelector( '#description' ) )

</script>
@endsection
