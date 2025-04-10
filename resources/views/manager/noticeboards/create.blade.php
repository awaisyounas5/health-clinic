@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.noticeboard') }}">Noticeboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Notice</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Notice Details</h4>
                        <form action="{{ route('manager.noticeboard.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Notice Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Notice Title"
                                        name="title" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Notice Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" required name="description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Create Notice</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
