@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Review</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Submit a Review</h6>
                        <form action="{{route('patient.reviews.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4 ">
                                <label class="label">Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="complaint">Complaint</option>
                                    <option value="suggestion">Suggestion</option>
                                    <option value="compliment">Compliment</option>
                                </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="attachment">Attachment</label>
                                <input type="file" name="attachment" id="attachment" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
