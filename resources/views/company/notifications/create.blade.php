@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.notifications.index') }}">Notifications
                                </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Send Notification</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Notification Details</h4>
                        <form action="{{ route('company.notifications.send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Send Notification to: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="user_type" required>
                                        <option value="" selected disabled>Please Choose Users</option>
                                        <option value="Staff">Send Notification to Staff Members</option>
                                        <option value="Patients">Send Notification to Patients</option>
                                        <option value="Manager">Send Notification to Managers</option>
                                        <option value="Everyone">Send Notification to Everyone</option>
                                    </select>
                                    @error('user_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Notification Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Notification Title"
                                        name="title" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Notification Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" required name="description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
